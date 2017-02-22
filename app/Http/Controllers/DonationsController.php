<?php

namespace App\Http\Controllers;

use App\MpesaDonation;
use App\MpesaPayment;
use App\PaypalDonation;
use App\Repositories\PaypalRepository;
use App\Repositories\RoleRepository;
use App\Subscriber;
use App\WithrawalRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
class DonationsController extends Controller
{
    //
    protected $user;
    protected $folder = "donations.";
    public function __construct()
    {
        $this->user = Auth::user();
        $menu = new RoleRepository();
        $menu->check();
    }
    public function prepare(User $user,Request $request){
        $paypal = new PaypalRepository($request);
        $data = $request->all();
        $data = $this->formatPhone($data);
        $subscriber = Subscriber::create($data);
        $via = $request->via;
//        dd($via);
        if($via=='mpesa'){
            return redirect("donations/donate_mpesa/$user->id/$subscriber->id?amount=$request->amount");
        }
        $amount = $request->amount;
        $rate = env('USD_RATE',100);
        $amount = round($amount/$rate,2);
        $paypal->prepareDonation($user,$subscriber,$amount);
        dd($request->all());
    }

    public function charge(User $user,Request $request){
        $paypal = new PaypalRepository($request);
        $payerId = $request->PayerID;
        $paymentId = $request->paymentId;
        if(!$paymentId ||  !$payerId){
            return redirect("/view_politician/$user->id")->with('notice',["class"=>"error","message"=>"Paypal top up was interrupted. Please try again later"]);
        }
        $paypal->request = $request;
        $response = $paypal->charge($payerId,$paymentId);
        $subscriber_id = $response->transactions[0]->item_list->items[0]->sku;
        $payer_email = $response->payer->payer_info->email;
        $usd_amount = $response->transactions[0]->amount->total;
        $txn = $user->paypalDonations()->create([
            'subscriber_id'=>$subscriber_id,
            'amount'=>$usd_amount,
            'txn_id'=>$response->id,
            'state'=>$response->state,
            'payer_email'=>$payer_email,
            'rate'=>env('USD_RATE',100)
        ]);
        return redirect("donations/paypal_success/$user->id/$txn->id");
    }

    public function paypalSuccess(User $user,$txn_id){
        $donation = PaypalDonation::find($txn_id);
        return view($this->folder.'paypal_success',[
            'user'=>$user,
            'donation'=>$donation
        ]);
    }

    public function mpesaDonation(User $user,Subscriber $subscriber,Request $request){

        return view($this->folder.'mpesa_donation',[
            'user'=>$user,
            'subscriber'=>$subscriber,
            'amount'=>$request->amount
        ]);
    }

    public function lookupMpesa(User $user,Subscriber $subscriber,Request $request){
        $amount = $request->amount;
        $code = $request->code;

        $mpesa_txn = MpesaPayment::where([
            ['transaction_reference','like',$code],
            ['sender_phone','like',$subscriber->phone],
            ['amount','like',$amount]
        ])->first();
//  dd($subscriber,$request->all(),$mpesa_txn);
        if($mpesa_txn){
            $mpesa_txn->delete();
            $donation_details = $mpesa_txn->toArray();
            $donation_details['user_id'] = $user->id;
            $donation_details['subscriber_id'] = $subscriber->id;
            $mpesa_donation = MpesaDonation::create($donation_details);
            return redirect("donations/mpesa_success/$mpesa_donation->id");
        }else{
            return redirect()->back()->withErrors([
                'code'=>'Invalid Transaction code'
            ]);
        }
    }

    protected function formatPhone($data){
        $phone = $data['phone'];
        $len = strlen($phone);
        if($len==10){
            $phone = "repl".$phone;
            $phone = str_replace('repl07','+2547',$phone);
        }
        if($len==12){
            $phone = '+'.$phone;
        }
        $data['phone']=$phone;
        return $data;
    }
    public function mpesaSuccess($txn_id){
        $donation = MpesaDonation::find($txn_id);
        $user = $donation->user;
        return view($this->folder.'mpesa_success',[
            'user'=>$user,
            'donation'=>$donation
        ]);
    }

    public function myDonations(){
        $user = Auth::user();
        $mpesa_donations = $user->mpesaDonations()->paginate(10);
        $paypal_donations = $user->paypalDonations()->paginate(10);
        $withdrawal_requests = $this->user->withdrawalRequests()->get();
        return view($this->folder.'my_donations',[
            'user'=>$user,
            'mpesa_donations'=>$mpesa_donations,
            'paypal_donations'=>$paypal_donations,
            'withdrawal_requests'=>$withdrawal_requests
        ]);
    }

    public function requestWithdrawal(Request $request){
        $withdrawal_request = $this->user->withdrawalRequests()->create($request->all());
        return redirect("my_donations")->with('notice',['class'=>'success','message'=>'Withdrawal Request received and will be processed soon']);
    }
}
