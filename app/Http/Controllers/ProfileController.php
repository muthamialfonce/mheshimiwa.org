<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Region;

use App\County;

use App\Constituency;

use App\Ward;

use App\Profile;
use App\Repositories\RoleRepository;

class ProfileController extends Controller
{

    protected $etc_folder = "etc.";
    protected $folder = "users.";

    public function __construct() {
        $role = new RoleRepository();
        $role->check();
        $this->middleware('auth');
    }

    public function viewProfile(User $user){
        $histories = $user->politics()->where('status','=',1)->get();
        $events = $user->politicalEvents()->orderBy('event_time','asc')->get();
        $agendas = $user->agendas()->orderBy('id','asc')->get();
        $educationlevels= $user->educationLevels()->orderBy('id','asc')->get();
        $paypal_txns = $user->paypalPayments()->orderBy('id','desc')->paginate(5);
        $mpesa_payments = $user->mpesaPayments()->orderBy('id','desc')->paginate(5);
        return view($this->folder.'profile_view',[
            'leader'=>$user,
            'histories'=>$histories,
            'events'=>$events,
            'agendas'=>$agendas,
            'educationlevels'=>$educationlevels,
            'paypal_txns'=>$paypal_txns,
            'mpesa_payments'=>$mpesa_payments
        ]);
    }

    public function approve(User $user){
        // if($user->balance()>1){
        //     return redirect("profile/view/$user->id")->with('notice',['class'=>'error','message'=>'User has not cleared service fee']);
        // }else{
            $user->approved = 1;
            $user->update();
            return redirect("profile/view/$user->id")->with('notice',['class'=>'success','message'=>'Politician has been approved and can now be viewed by all citizens']);
        // }
    }
    public function disapprove(User $user){
            $user->approved = 0;
            $user->update();
            return redirect("profile/view/$user->id")->with('notice',['class'=>'success','message'=>'Politician has been disapproved and can now be viewed by all citizens']);
    }
}
