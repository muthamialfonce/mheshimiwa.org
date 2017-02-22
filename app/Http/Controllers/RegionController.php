<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\County;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Region;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Repositories\RoleRepository;

class RegionController extends Controller
{
    protected $user;
    protected $folder = "regions.";
    
    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user = Auth::user();
    }

    public function index(){
        $regions = Region::orderBy('created_at')->paginate(10);

        return view($this->folder.'index',[
            'regions'=>$regions
        ]);
    }

    public function store(Request $request){
       $this->user->regions()->updateOrCreate(['id'=>$request->id],[
            'name'=>$request->name
       ]);
        $request->session;
        return redirect("regions")->with('notice',['class'=>'success','message'=>'Region saved']);
   }

    public function delete(Region $region){
        $region->delete();
        return redirect("regions")->with('notice',['class'=>'success','message'=>'Region Deleted']);
    }

    public function import(Request $request){
        if($request->method()=='POST'){
            $file = $request->file('csv');
            $no = 0;
            $file_res = fopen($file->getRealPath(),'r');
           while($row = fgetcsv($file_res)){
               $no++;
               if($no>1){
                   $county_name=stripslashes(trim(strip_tags($row[2])));
                   $constituency_name = stripslashes(trim(strip_tags($row[1])));
                   $ward_name = stripslashes(trim(strip_tags($row[0])));
                   $county = County::where([
                       ['name','like',$county_name]
                   ])->first();
                   if($county){
                       $constituency = $county->constituencies()->where([
                           ['name','like',$constituency_name]
                       ])->first();
                       if(!$constituency){
                           $constituency= $county->constituencies()->create([
                               'name'=>$constituency_name,
                               'user_id'=>$this->user->id
                           ]);
                       }
                       $ward = $constituency->wards()->where([
                           ['name','like',$ward_name]
                       ])->first();
                       if(!$ward){
                           $constituency->wards()->create([
                               'name'=>$ward_name,
                               'user_id'=>$this->user->id
                           ]);
                       }
                   }
               }

           }
            return redirect("regions")->with('notice',['class'=>'success','message'=>'Data import succeeded']);
        }
        return view($this->folder.'import');
    }
}
