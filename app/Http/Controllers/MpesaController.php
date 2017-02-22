<?php

namespace App\Http\Controllers;

use App\MpesaPayment;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Http\Requests;
use App\Repositories\RoleRepository;
class MpesaController extends Controller
{
    protected $folder = "political_levels.";
    protected $user;

    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user = Auth::user();
    }

    public function pay(Request $request){
        $mpesa_details = $request->all();
        $mpesa = MpesaPayment::create($mpesa_details);
        return $mpesa->toJson();
    }

    protected function checkSource(){
        
    }
}
