<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class ConfigurationController extends Controller
{
    //
    protected $user;
    protected $folder="config.";
    function __construct()
    {
        $this->user = Auth::user();
        $role = new RoleRepository();
        $role->check();
    }

    public function index(){
        $configurations = Configuration::all();
        return view($this->folder.'index',[
            'configurations'=>$configurations
        ]);
    }

    public function store(Request $request){
        $config_details = $request->all();
        $config_details['slug'] = str_replace(" ","_",$config_details['slug']);
        $this->user->configurations()->updateOrCreate(['slug'=>$config_details['slug']],$config_details);
        return redirect("config")->with('notice',['class'=>'success','message'=>'saved']);
    }
}
