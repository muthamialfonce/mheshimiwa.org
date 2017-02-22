<?php

namespace App\Http\Controllers;

use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
class PortfolioController extends Controller
{
    //
    protected $folder = "portfolio.";
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
        $role = new RoleRepository();
        $role->check();
    }

    public function index(){
        $portfolios = $this->user->portfolio;
        return view($this->folder.'index',[
            'portfolios'=>$portfolios
        ]);
    }

    public function store(Request $request){
        $user = $this->user;
        $file = $request->file('image');
        $real_path = @$file->getRealPath();
        if(!getimagesize($real_path)){
            return redirect('portfolio')->with('notice',['class'=>'error','message'=>'Invalid Image!']);
        }
        $filename = $file->getClientOriginalName();
        $year = date('Y');
        $month = date('M');
        $day = date('d');
        $user_folder = "user_".$this->user->id.'_images';
        $relative_path = '/porfolio/'.$user_folder.'/'.$year.'/'.$month.'/'.$day;
        $directory =public_path().$relative_path;
        $new_name = strtotime(date('h:i:s')).'_' .str_replace(' ','_',$filename);
        $path = $relative_path.'/'.$new_name;
        if($request->file('image')->move($directory,$new_name)){
            $this->user->portfolio()->create([
                'image'=>$path,
                'description'=>$request->description
            ]);
            return redirect('portfolio')->with('notice',['class'=>'success','message'=>'Image uploaded']);

        }else{
            return redirect('portfolio')->with('notice',['class'=>'error','message'=>'An unexpected error occurred while uploading image. Please retry!']);

        }
    }
}
