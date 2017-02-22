<?php

namespace App\Http\Controllers;

use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\AcademicLevel;

use Auth;

class AcademicLevelController extends Controller
{
	protected $folder="education_levels.";
	protected $user;
    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
   $this->user=Auth::User();

    }

    public function index(Request $request)
    {
$academiclevels= AcademicLevel::orderBy('id','asc')->paginate(10);


return view($this->folder.'academiclevel',[

       'academiclevels'=>$academiclevels

	]);
    }


    public function store(Request $request)
    { 
    	$academiclevel= new AcademicLevel();

      $this->user->academiclevels()->updateOrCreate(['id'=>$request->id],[
            'name'=>$request->name,
            'details'=>$request->details,
        ]);

return redirect('academic')->with('notice',['class'=>'success', 'message'=>'Academic level saved']);
    }

    public function destroy(AcademicLevel $academiclevel)
    {
        $academiclevel->delete();
        return redirect('academic')->with('notice',['class'=> 'info', 'message'=>'Level deleted']);
    }

}
