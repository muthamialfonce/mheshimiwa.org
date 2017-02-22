<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\PoliticalLevel;
use App\Repositories\RoleRepository;

class LevelsController extends Controller
{
    //
    protected $folder = "political_levels.";
    protected $user;

    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user = Auth::user();
    }

    public function index(){
        $levels = PoliticalLevel::orderBy('rank','asc')->paginate(10);

        return view($this->folder.'index',[
            'levels'=>$levels
        ]);
    }

    public function store(Request $request){
        $this->user->politicalLevels()->updateOrCreate(['id'=>$request->id],[
            'name'=>$request->name,
            'description'=>$request->description,
            'rank'=>$request->rank
        ]);
        return redirect("levels")->with('notice',['class'=>'success','message'=>' saved']);
    }

    public function delete(PoliticalLevel $level){
        $level->delete();
        return redirect("levels")->with('notice',['class'=>'success','message'=>'Level Deleted']);
    }
}
