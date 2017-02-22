<?php

namespace App\Http\Controllers;

use App\Politic;
use App\PoliticalParty;
use App\PoliticalSeat;
use App\Social;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\RoleRepository;
use Auth;
use Storage;

class AccountController extends Controller
{
    //
    protected $folder = "account.";
    protected $user;
    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user=Auth::User();


    }

    public function index()
    {
        if($this->user->role == 'admin'){
            return redirect("levels");
        }
        $user = $this->user;
        $politics=$user->politics()->where('status',0)->get();
        $parties = PoliticalParty::all();
        $seats = PoliticalSeat::all();
        $history = $this->user->politics()->where('status','=',1)->paginate(10);
        return view($this->folder.'index',[
            'user'=>$user,
            'parties'=>$parties,
            'seats'=>$seats,
            'histories'=>$history,
            'politics'=>$politics
        ]);
    }
    public function saveHistory(Request $request){
        $history = $this->user->politics()->updateOrCreate(['id'=>$request->id],[
            'political_party_id'=>$request->political_party_id,
            'political_seat_id'=>$request->political_seat_id,
            'year'=>$request->from,
            'comments'=>$request->comments,
            'ended'=>$request->to
        ]);
        $history->status = 1;
        $history->update();
        return redirect("account")->with('notice',['class'=>'info','message'=>'Political history Added successfully']);
    }

    public function deleteHistory(Politic $politic){
        $politic->delete();
        return redirect("account")->with('notice',['class'=>'info','message'=>'History Removed']);
    }

    public function profileImage(Request $request){
        $user = $this->user;
        $file = $request->file('image');
        $real_path = @$file->getRealPath();
        if(!getimagesize($real_path)){
            return redirect('account')->with('notice',['class'=>'error','message'=>'Invalid Image!']);
        }
        $filename = $file->getClientOriginalName();
        $year = date('Y');
        $month = date('M');
        $day = date('d');
        $relative_path = '/uploads/'.$year.'/'.$month.'/'.$day;
        $directory =public_path().$relative_path;
        $new_name = strtotime(date('h:i:s')).'_' .str_replace(' ','_',$filename);
        $path = $relative_path.'/'.$new_name;
        if($request->file('image')->move($directory,$new_name)){
            $user->image = $path;
            $user->update();
            return redirect('account')->with('notice',['class'=>'success','message'=>'Profile Pic Updated']);

        }else{
            return redirect('account')->with('notice',['class'=>'error','message'=>'An unexpected error occurred while uploading image. Please retry!']);

        }
    }

    public function socialMedia(Request $request){
        $social = $this->user->socials()->updateOrCreate(['website'=>$request->website],[
            'url'=>$request->url,
            'username'=>$request->username,
            'website'=>$request->website
        ]);
        return redirect('account')->with('notice',['class'=>'success','message'=>'Social Profile Updated']);
    }
}
