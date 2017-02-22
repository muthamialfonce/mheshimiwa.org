<?php

namespace App\Http\Controllers;

use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;



use App\User;

use App\Achievement;

use Auth;

class AchievementController extends Controller
{
    protected $folder="achievements.";
    protected $user;

    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user=Auth::User();
    }
    public function Index()
    {
        $achievements = $this->user->achievements()->orderBy('id','asc')->paginate(10);
        return view($this->folder.'index',[
            'achievements'=>$achievements
        ]);
    }

    public function store(Request $request)
    {
        $this->user->achievements()->updateOrCreate(['id'=>$request->id],[
            'achievement'=>$request->achievement,
//            'date'=>$request->date,
            'description'=>$request->description
        ]);
        return redirect('achievement')->with('notice',['class' =>'info', 'message'=>'achievement saved']);
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return redirect('achievement')->with('notice',['class'=> 'info', 'message'=>'Achievement deleted']);
    }
}
