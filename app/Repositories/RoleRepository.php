<?php
/**
 * Created by PhpStorm.
 * User: iankibet
 * Date: 2016/06/04
 * Time: 7:47 AM
 */

namespace App\Repositories;


use App\Configuration;
use App\Page;
use App\PoliticalLevel;
use App\PoliticalSeat;
use Illuminate\Support\Facades\Auth;
use Storage;
use View;
use Redirect;
use Illuminate\Support\Facades\Route;
use App\User;
class RoleRepository
{
    protected $path;
    protected $user;
    protected $menus;
    protected $allow=false;
    public function __construct()
    {
        $this->user = Auth::user();
        $this->showConfig();
        $this->path = Route::getFacadeRoot()->current()->uri();
        if(@$this->user->role=='politician'){
            $this->checkPayments();
        }

    }

    public function check($allow=false){
        $this->allow = $allow;
        $file = Storage::disk('local')->get('config.json');
        $menus = json_decode($file);
        $this->menus = $menus;

        if(!$menus ){
            die('Error decoding json config');
        }
        if(Auth::user()){
            $user = Auth::user();
            $role = $user->role;
            $allowed = $menus->$role;
            if($user->role=='admin'){
                $allowed = $this->injectPoliticianProfiles($allowed);
            }
            $this->authorize($allowed,$menus->guest);
            if($role=='politician'){
            $this->checkProfile($user);
            }


        }else{
            $out_menus = $menus->guest;
            $pages = Page::all();
            foreach($pages as $page){
                $mnu = new \stdClass();
                $mnu->slug = $page->slug;
                $mnu->name = $page->menu_label;
                $mnu->type = 'single';
                $menus = new \stdClass();
                $menus->label = $page->menu_label;
                $menus->icon = '';
                $menus->url = 'pg-'.$page->slug;
                $mnu->menus = $menus;
                $out_menus[]=$mnu;
            }
            foreach($this->menus->out as $mnu){
                $out_menus[]=$mnu;
            }



            View::share('menus',$out_menus);
        }

    }
    protected function injectPoliticianProfiles($menus){
        $levels = PoliticalSeat::orderBy('rank','asc')->get();
//        dd($levels);
        foreach($menus as $menu){
            if($menu->slug=='political_levels'){
                $single = [
                    'url'=>"aspirants/view/all",
                    "label"=>'All'
                ];
                $menu->children[]=(object)$single;
                foreach($levels as $level){
                    $single = [
                        'url'=>"aspirants/$level->id",
                        "label"=>str_plural($level->name)
                    ];
                    $menu->children[]=(object)$single;
                }
            }
        }
        return $menus;
    }
    protected function checkProfile($user){
        $allowed = ['user/complete_profile','logout','user/get_counties','user/get_wards','user/get_constituencies'];


        if($user->profile==null && in_array($this->path,$allowed) == false ){
            Redirect::to("user/complete_profile")->send();
        }
        if($user->profile){
            $asipring = $user->politics()->where([
                ['status','=',0],
                ['year','=',2017]
            ])->first();
            $allowed = ['user/aspiring_position'];
            if(!$asipring && in_array($this->path,$allowed) == false){
                Redirect::to("user/aspiring_position")->send();
            }
        }

    }

    protected function checkPayments(){
        $user = $this->user;
        $amount_to_pay = 0;
        $mpesa_payments = $user->mpesaPayments()->sum('amount');
        $total_paid = $mpesa_payments;
        $aspiring_politic = $user->getInterestedSeat();
        if($aspiring_politic){
            $amount_to_pay = (int)@$aspiring_politic->seat->rate->amount;
        }
        View::share('politician_payments',[
            'paid'=>$total_paid,
            'cost'=>$amount_to_pay
        ]);
    }

    protected function authorize($backend,$front_end){
        $current = preg_replace('/\d/', '', $this->path );
        $current = preg_replace('/{(.*?)}/', '', $current );
        $current = rtrim($current, '/');
        View::share('current_url',$current);
        $backend_urls = $this->separateLinks($backend);
//        dd($current,$backend_urls);
        $front_end_urls = $this->separateLinks($front_end);
//        dd($backend_urls,$current);
        $current = str_replace("//","/",$current);
        if(in_array($current,$backend_urls)){
            View::share('menus',$backend);
        }elseif(in_array($current,$front_end_urls) || $this->allow == true){
            $pages = Page::all();
            foreach($this->menus->in as $mnu){
                $front_end[] = $mnu;
            }
            foreach($pages as $page){
                $mnu = new \stdClass();
                $mnu->slug = $page->slug;
                $mnu->name = $page->menu_label;
                $mnu->type = 'single';
                $menus = new \stdClass();
                $menus->label = $page->menu_label;
                $menus->icon = '';
                $menus->url = 'pg-'.$page->slug;
                $mnu->menus = $menus;
               $front_end[]=$mnu;
            }
            View::share('menus',$front_end);
        }else{
            $this->unauthorized();
        }


//        dd($backend_urls,$front_end_urls);
    }

    protected function separateLinks($raw_menu){
        $links = [];
        foreach($raw_menu as $single){
            if($single->type=='many'){
                foreach($single->children as $child){
                    $child_url = preg_replace('/\d/', '', $child->url );
                    $child_url = rtrim($child_url, '/');
                    if(!in_array($child_url,$links))
                        $links[]=$child_url;
                }
                if(isset($single->urls))
                    foreach($single->urls as $url){
                        $url = rtrim($url, '/');
                        $url = preg_replace('/\d/', '', $url );
                        if(!in_array($url,$links))
                            $links[]=$url;
                    }

            }else{
                $child_url = preg_replace('/\d/', '', $single->menus->url );
                $child_url = rtrim($child_url, '/');
                if(!in_array($child_url,$links))
                    $links[]=$child_url;
            }
            if(isset($single->urls))
                foreach($single->urls as $url){
                    $url = rtrim($url, '/');
                    $url = preg_replace('/\d/', '', $url );
                    if(!in_array($url,$links))
                        $links[]=$url;
                }
        }
        return $links;
    }

    public function unauthorized(){
        $path = $this->path;
        if($path=='account' && $this->user->role=='admin'){
            return Redirect::to('levels')->send();
        }
        if($path=='levels' && $this->user->role=='politician'){
            return Redirect::to('account')->send();
        }
        if($path=='account' && $this->user->role=='editor'){
            return Redirect::to('pages')->send();
        }
        if($path=='levels' && $this->user->role=='editor'){
            return Redirect::to('pages')->send();
        }
        echo "You are not Authorized to perform this action";
        die();
    }

    public function showConfig(){
        $configs = Configuration::all();
        $config_data = [];
        foreach($configs as $config){
            $details = [];
            $details['amount']=$config->amount;
            $details['type']=$config->inc_type;
            $config_data[$config->slug]= (object)$details;
        }
        View::share('config',$config_data);
    }
}