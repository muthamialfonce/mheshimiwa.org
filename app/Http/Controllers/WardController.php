<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Constituency;

use DB;

use App\Ward;
use Auth;
use App\Repositories\RoleRepository;

class WardController extends Controller
{
    protected $user;
    protected $folder = "wards.";

    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user = Auth::user();
    }

       public function index()
    {
          if(isset($_GET['search'])){
           $constituencies = Constituency::get();
            $search= \Request::get('search');

        $wards =DB::table('wards')
                               ->join('constituencies','wards.constituency_id','=','constituencies.id')
                               ->join('users','users.id','=','wards.user_id')
                               ->select('constituencies.name as constituency','constituencies.id as constituencyId','wards.id as id','wards.name as name','wards.created_at as created_at','users.name as username')
                               ->where('wards.name','like','%'.$search.'%')
                               ->orwhere('constituencies.name','like','%'.$search.'%')
                               ->orderBy('wards.name','asc')->paginate(10);
                            

            return view($this->folder.'index',[
            'wards'=>$wards,
            'constituencies'=>$constituencies
        ]);

        }

        else{
                    $wards =DB::table('wards')
                               ->join('constituencies','wards.constituency_id','=','constituencies.id')
                               ->join('users','users.id','=','wards.user_id')
                               ->select('constituencies.name as constituency','constituencies.id as constituencyId','wards.id as id','wards.name as name','wards.created_at as created_at','users.name as username')
                               ->orderBy('wards.name','asc')->paginate(10);
        $constituencies = Constituency::get();
        return view($this->folder.'index',[
            'wards'=>$wards,
            'constituencies'=>$constituencies
        ]);
    }
}

    public function store(Request $request){
      $this->user->wards()->updateOrCreate(['id'=>$request->id],[
          'constituency_id'=>$request->constituency_id,
          'name'=>$request->name
      ]) ;
        return redirect("wards")->with("notice",['class'=>'success','message'=>'Ward Saved']);
    }

    public function delete(Ward $ward){
        $ward->delete();
        return redirect("wards")->with("notice",['class'=>'success','message'=>'Ward deleted']);
    }
}
