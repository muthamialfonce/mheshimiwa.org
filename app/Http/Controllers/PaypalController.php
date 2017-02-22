<?php

namespace App\Http\Controllers;

use App\PaypalPayment;
use App\Repositories\PaypalRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\User;

class PaypalController extends Controller
{
    //
    protected $user;
    protected $folder = "payments.";
    protected $paypalRepo;
    public function __construct(RoleRepository $roleRepository)
    {
        $roleRepository->check();
        $this->user = Auth::user();
    }

    public function prepare(Request $request){
        $user = $this->user;
        $balance = $user->balance();
        $usd_balance = $balance/env('USD_RATE',105);
        $usd_balance = round($usd_balance,2);
        $PayalRepo = new PaypalRepository($request);
       $PayalRepo->prepare($usd_balance);
    }

    public function charge(Request $request){
        $paypal = new PaypalRepository($request);
        $payerId = $request->PayerID;
        $paymentId = $request->paymentId;
        if(!$paymentId ||  !$payerId){
            return redirect('/account')->with('notice',["class"=>"error","message"=>"Paypal top up was interrupted. Please try again later"]);
        }
        $paypal->request = $request;
        $response = $paypal->charge($payerId,$paymentId);
        $user_id = $response->transactions[0]->item_list->items[0]->sku;
        $payer_email = $response->payer->payer_info->email;
        $usd_amount = $response->transactions[0]->amount->total;
        $user = User::find($user_id);
        $txn = $user->paypalPayments()->create([
            'amount'=>$usd_amount,
            'txn_id'=>$response->id,
            'state'=>$response->state,
            'payer_email'=>$payer_email,
            'rate'=>env('USD_RATE')
        ]);
       return redirect("paypal/success/$txn->id");
    }

    public function cancel(){

    }

    public function success($id){
        $payment = PaypalPayment::findOrFail($id);
        return view($this->folder.'paypal_success',[
            'payment'=>$payment
        ]);
    }
}
