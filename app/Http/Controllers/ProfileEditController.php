<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Repositories\RoleRepository;

use Auth;

use Hash;

class ProfileEditController extends Controller
{


    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user = Auth::user();
    }
    public function index()
    {
        $id=Auth::user()->id;
        $user=User::all()->where('id',$id)->first();
        return view('users/edituser',[
            'user'=>$user
        ]);
    }
    public function store(Request $request, User $user)
    {
        if($request->name!="")
        {
            $user->updateOrCreate(['id'=>$request->id],[
                'name'=>$request->name,
            ]);
            return redirect("myprofile")->with('notice',['class'=>'success', 'message'=>'name saved']);
        }

        if($request->email!="")
        {
            $user->updateOrCreate(['id'=>$request->id],[
                'email'=>$request->email,
            ]);
            return redirect("myprofile")->with('notice',['class'=>'success', 'message'=>'email saved']);
        }

        if($request->gender!="")
        {
            $user->updateOrCreate(['id'=>$request->id],[
                'gender'=>$request->gender,
            ]);
            return redirect("myprofile")->with('notice',['class'=>'success', 'message'=>'gender saved']);
        }

        if($request->password!="")
        {
            $user->updateOrCreate(['id'=>$request->id],[
                'password'=>bcrypt($request->password),
            ]);
            return redirect("myprofile")->with('notice',['class'=>'success', 'message'=>'Password updated']);
        }
    }


}
