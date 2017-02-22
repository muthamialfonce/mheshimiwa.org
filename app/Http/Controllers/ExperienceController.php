<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Repositories\RoleRepository;

class ExperienceController extends Controller
{
    protected $folder="experience.";
    protected $user;

    /**
     * ExperienceController constructor.
     */
    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
    $this->user=Auth::User();
    }

    public function index()
    {
        $experiences = $this->user->experiences()->orderBy('id','asc')->paginate(10);
        return view($this->folder.'index' ,[
            'experiences'=>$experiences
        ]);
    }

    public function store(Request $request)
    {
        $this->user->experiences()->updateOrCreate(['id'=>$request->id],[
            'datefrom'=>$request->datefrom,
            'dateto'=>$request->dateto,
            'description'=>$request->description,
            'name'=>$request->name,
            'place'=>$request->place
        ]);

        return redirect('experiences')->with('notice',['class'=>'info','message'=>'data saved']);
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect('experiences')->with('notice',['class'=> 'info', 'message'=>'Experience deleted']);
    }
}
