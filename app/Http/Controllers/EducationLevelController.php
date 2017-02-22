<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\EducationLevel;

use App\AcademicLevel;
use App\Repositories\RoleRepository;

use Auth;

class EducationLevelController extends Controller
{
    protected $user;
    protected $folder="education_levels.";

    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
    	$this->user=Auth::User();
    }

    public function index()
    {
$academiclevels= AcademicLevel::all()->lists('name','id');
$educationlevels= $this->user->educationLevels()->orderBy('id','asc')->paginate(10);

return view($this->folder.'index',[

       'educationlevels'=>$educationlevels,
       'academiclevels'=>$academiclevels

	]);
    }


    public function store(Request $request)
    {
        $this->user->educationLevels()->updateOrCreate(['id'=>$request->id],[
            'name'=>$request->name,
            'joined'=>$request->joined,
            'completed'=>$request->completed,
            'achievement'=>$request->achievement,
             'academic_level_id'=>$request->academic_level_id
        ]);

return redirect('education')->with('notice',['class'=>'success', 'message'=>'Details saved']);
    }

    public function destroy(EducationLevel $educationlevel)
    {
        $educationlevel->delete();
        return redirect('education')->with('notice',['class'=> 'info', 'message'=>'Level deleted']);
    }

}
