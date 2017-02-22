<?php

namespace App\Http\Controllers;

use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;



use App\User;

use App\Agenda;

use Auth;

class AgendaController extends Controller
{
    //
    protected $folder="agendas.";
    protected $user;

    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user=Auth::User();
    }
    public function Index()
    {
        $agendas = $this->user->agendas()->orderBy('id','asc')->paginate(10);
        return view($this->folder.'index',[
            'agendas'=>$agendas
        ]);
    }

    public function store(Request $request)
    {
        $this->user->agendas()->updateOrCreate(['id'=>$request->id],[
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return redirect('agendas')->with('notice',['class' =>'info', 'message'=>'agenda saved']);
    }

    public function delete(Agenda $agenda)
    {
        $agenda->delete();
        return redirect('agendas')->with('notice',['class'=> 'info', 'message'=>'Agenda deleted']);
    }
}
