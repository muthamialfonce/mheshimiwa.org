<?php

namespace App\Http\Controllers;

use App\Page;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class PagesController extends Controller
{
    //

    protected $folder = "pages.";
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
        $role = new RoleRepository();
        $role->check();
    }

    public function index(){
        $pages = Page::orderBy('id','desc')->paginate(10);
        return view($this->folder.'index',[
            'pages'=>$pages
        ]);
    }

    public function addPage(){
        $page = new Page();
        return view($this->folder.'new',[
            'page'=>$page
        ]);
    }
    public function editPage(Page $page){
        return view($this->folder.'new',[
            'page'=>$page
        ]);
    }

    public function deletePage(Page $page){
        $page->delete();
        return redirect("pages")->with('notice',['class'=>'success','message'=>'deleted!']);
    }

    public function store(Request $request){
        $page_details = $request->all();
        $page = Page::find($request->id);
        if(count($page)){
            $page->update($page_details);
            $page->save();
        }else{
            $page_details['user_id']=$this->user->id;

            $slug = $this->createSlug($request->title);
            $exists = 1;
            $slug_no = 0;
            while($exists ==1 ){
                if($slug_no==0){
                    $real_slug = $slug;
                }else{
                    $real_slug = $slug.'-'.$slug_no;

                }
                $exists = count(Page::where([
                    ['slug','like',$real_slug]
                ])->get());

                $slug_no++;
            }
            $page_details['slug'] = $real_slug;
            $page = Page::create($page_details);
        }

        return redirect("pages")->with('notice',['class'=>'info','message'=>'page saved']);
    }

    public static function createSlug($string) {

        $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-'
        );

        // -- Remove duplicated spaces
        $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

        // -- Returns the slug
        return strtolower(strtr($string, $table));


    }

}
