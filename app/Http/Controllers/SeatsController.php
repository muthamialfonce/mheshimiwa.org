<?php

namespace App\Http\Controllers;

use App\PoliticalLevel;
use App\PoliticalSeat;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Repositories\RoleRepository;

class SeatsController extends Controller
{
    //
    protected $user;
    protected $folder = "seats.";
    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user = Auth::user();
    }

    public function index(){
        $seats = PoliticalSeat::orderBy('rank','asc')->paginate(10);
        $levels = PoliticalLevel::orderBy('rank','asc')->get();
        return view($this->folder.'index',[
            'seats'=>$seats,
            'levels'=>$levels
        ]);
    }

    public function store(Request $request){
        $this->user->politicalSeats()->updateOrCreate(['id'=>$request->id],[
            'name'=>$request->name,
            'political_level_id'=>$request->level_id,
            'description'=>$request->description,
            'rank'=>$request->rank
        ]);
        return redirect("seats")->with('notice',['class'=>'success','message'=>'Seat saved']);
    }

    public function delete(PoliticalSeat $seat){
        $seat->delete();
        return redirect("seats")->with('notice',['class'=>'success','message'=>'Seat Deleted']);
    }
}
