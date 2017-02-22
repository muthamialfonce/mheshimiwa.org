<?php

namespace App\Http\Controllers;

use App\MpesaDonation;
use App\MpesaPayment;
use App\PaypalDonation;
use App\PaypalPayment;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class PaymentsController extends Controller
{
    //
    protected $user;
    protected $folder="payments.";
    public function __construct(RoleRepository $roleRepository)
    {
        $roleRepository->check();
        $this->user = Auth::user();
    }

    public function mpesaPayments(){
        $payments = MpesaPayment::join('users','users.phone','=','mpesa_payments.sender_phone')->orderBy('mpesa_payments.id','desc')->paginate(10);
        return view($this->folder.'mpesa_payments',[
            'payments'=>$payments
        ]);
    }
    public function paypalPayments(){
        $payments = PaypalPayment::orderBy('id','desc')->paginate(10);
        return view($this->folder.'paypal_payments',[
            'payments'=>$payments
        ]);
    }

    public function mpesaDonations(){
        $donations = MpesaDonation::orderBy('id','desc')->paginate(10);
        return view($this->folder.'mpesa_donations',[
            'donations'=>$donations
        ]);
    }
    public function paypalDonations(){
        $donations = PaypalDonation::orderBy('id','desc')->paginate(10);
        return view($this->folder.'paypal_donations',[
            'donations'=>$donations
        ]);
    }
}
