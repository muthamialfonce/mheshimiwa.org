<?php

namespace App\Http\Controllers;

use App\PoliticalSeat;
use App\Rate;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class RatesController extends Controller
{
    //
    protected $folder = "rates.";
    protected $user;

    public function __construct(RoleRepository $roleRepository)
    {
      $roleRepository->check();
        $this->user = Auth::user();
    }

    public function index(){
        $rates = Rate::orderBy('amount','asc')->paginate(10);
        $seats = PoliticalSeat::all();
        return view($this->folder.'index',[
            'rates'=>$rates,
            'seats'=>$seats
        ]);
    }

    public function store(Request $request){
        $rate = Rate::findOrNew($request->id);
        $rate->amount = $request->amount;
        $rate->user_id = $this->user->id;
        $rate->political_seat_id = $request->seat_id;
        $rate->save();
        return redirect("rates")->with('notice',['class'=>'success','message'=>'Rate Saved!']);
    }

    public function delete(Rate $rate){
        $rate->delete();
        return redirect("rates")->with('notice',['class'=>'success','message'=>'Rate Deleted!']);
    }
}
