<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use DB;

use App\Region;

use App\County;
use Auth;
use App\Repositories\RoleRepository;

class CountyController extends Controller
{
    protected $user;
    protected $folder = "counties.";
    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
       $this->user = Auth::user();
    }

    public function index(){
           if(isset($_GET['search'])){
            $regions = Region::get();
            $search= \Request::get('search');

        $counties = DB::table('counties')
                               ->join('regions','regions.id','=','counties.region_id')
                               ->join('users','users.id','=','counties.user_id')
                               ->select('regions.name as region','regions.id as regionId','users.name as username','counties.id as id','counties.name as name','counties.created_at as created_at')
                               ->where('regions.name','like','%'.$search.'%')
                               ->orwhere('counties.name','like','%'.$search.'%')
                               ->orderBy('id','asc')->paginate(10);
                 return view($this->folder.'index',[
            'counties'=>$counties,
            'regions'=>$regions
        ]);
        }
        else{
        $regions = Region::get();
                $counties = DB::table('counties')
                               ->join('regions','regions.id','=','counties.region_id')
                               ->join('users','users.id','=','counties.user_id')
                               ->select('regions.name as region','regions.id as regionId','counties.id as id','counties.name as name','counties.created_at as created_at','users.name as username')
                               ->orderBy('id','asc')->paginate(10);
        return view($this->folder.'index',[
            'counties'=>$counties,
            'regions'=>$regions
        ]);
    }
}


    public function store(Request $request){
        $this->user->counties()->updateOrCreate(['id'=>$request->id],[
            'name'=>$request->name,
            'region_id'=>$request->region_id
        ]);
        return redirect("counties")->with('notice',['class'=>'info','message'=>'County Added']);
    }

    public function delete(County $county){
        $county->delete();
        return redirect("counties")->with('notice',['class'=>'info','message'=>'County deleted']);
    }

}
