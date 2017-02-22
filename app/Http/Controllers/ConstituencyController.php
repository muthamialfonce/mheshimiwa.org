<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;

use DB;

use App\County;

use App\Constituency;
use Auth;
class ConstituencyController extends Controller
{

    protected $folder = "constituencies.";
    protected $user;

    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user = Auth::user();
    }

    public function index(){
         if(isset($_GET['search'])){
           $counties = County::all();
            $search= \Request::get('search');

        $constituencies = DB::table('constituencies')
                               ->join('counties','counties.id','=','constituencies.county_id')
                               ->join('users','users.id','=','constituencies.user_id')
                               ->select('constituencies.id as id','constituencies.name as name','constituencies.created_at as created_at','counties.id as countyId','counties.name as county','users.name as username')
                               ->where('constituencies.name','like','%'.$search.'%')
                               ->orwhere('counties.name','like','%'.$search.'%')
                               ->orderBy('id','asc')->paginate(10);
             return view($this->folder.'index',[
            'constituencies'=>$constituencies,
            'counties'=>$counties
        ]);
        }
        else
        {
                    $constituencies = DB::table('constituencies')
                               ->join('counties','counties.id','=','constituencies.county_id')
                               ->join('users','users.id','=','constituencies.user_id')
                               ->select('constituencies.id as id','constituencies.name as name','constituencies.created_at as created_at','counties.id as countyId','counties.name as county','users.name as username')
                               ->orderBy('id','desc')->paginate(10);
        $counties = County::all();
        return view($this->folder.'index',[
            'constituencies'=>$constituencies,
            'counties'=>$counties
        ]);
    }
        }
       
   

    public function store(Request $request){
        $this->user->constituencies()->updateOrCreate(['id'=>$request->id],[
            'name'=>$request->name,
            'county_id'=>$request->county_id
        ]);
        return redirect("constituencies")->with("notice",["class"=>"success","message"=>"Constituency Saved"]);
    }

    public function delete(Constituency $constituency){
        $constituency->delete();
        return redirect("constituencies")->with("notice",["class"=>"success","message"=>"Constituency deleted"]);
    }

}
