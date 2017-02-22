<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\County;
use App\Politic;
use App\PoliticalParty;
use App\PoliticalSeat;
use App\Region;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Repositories\RoleRepository;

class UserController extends Controller
{
    protected $folder = "users.";
    protected $user;
    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user=Auth::User();
    }

    public function completeProfile()
    {
        $regions = Region::get();
        return view($this->folder.'complete_profile',[
            'regions'=>$regions
        ]);

    }

    public function getWards(Request $request)
    {
        $constituency = Constituency::find($request->constituency_id);
        $wards = $constituency->wards;
        return $wards;
    }

    public function getConstituencies(Request $request)
    {
        $county = County::find($request->county_id);
        $constituencies = $county->constituencies;
        return $constituencies;
    }

    public function getCounties(Request $request)
    {
        $region = Region::find($request->region_id);
        $counties = $region->counties;
        return $counties;
    }

    public function saveProfile(Request $request){
        $id = @$this->user->profile->id;
        $this->user->profile()->updateOrCreate(['id'=>$id],[
           'county_id'=>$request->county_id,
            'region_id'=>$request->region_id,
            'ward_id'=>$request->ward_id,
            'constituency_id'=>$request->constituency_id
        ]);
        $aspiring = $this->user->politics()->where([
            ['status','=',0],
            ['year','=',env('CAMPAIGN_YEAR')]
        ])->first();
        if($aspiring){
            return redirect("account")->with('notice',['class'=>'success','message'=>'Profile Saved Successfully']);
        }
        return redirect("user/aspiring_position")->with('notice',['class'=>'success','message'=>'Profile Saved Successfully']);
    }

    public function completePolitic(){
        $parties = PoliticalParty::all();
        $seats = PoliticalSeat::all();
        $aspiring = @$this->user->politics()->where([
            ['status','=',0],
            ['year','=',2017]
        ])->first();
        if(!$aspiring){
            $aspiring = new Politic();
        }
        return view($this->folder.'position',[
            'parties'=>$parties,
            'seats'=>$seats,
            'aspiring'=>$aspiring
        ]);
    }

    public function savePolitic(Request $request){
        $this->user->politics()->updateOrCreate(['id'=>$request->id],[
            'political_party_id'=>$request->political_party_id,
            'political_seat_id'=>$request->political_seat_id,
            'year'=>2017,
            'comments'=>$request->comments
        ]);
        return redirect("/account");
    }

    public function profile(){
        $user = $this->user;
        return view($this->folder.'profile',[
            'user'=>$user
        ]);
    }

    public function userDonations(User $user){
        $mpesa_donations = $user->mpesaDonations()->paginate(10);
        $paypal_donations = $user->paypalDonations()->paginate(10);
        $withdrawal_requests = $user->withdrawalRequests()->get();
        return view('donations.my_donations',[
            'user'=>$user,
            'mpesa_donations'=>$mpesa_donations,
            'paypal_donations'=>$paypal_donations,
            'withdrawal_requests'=>$withdrawal_requests
        ]);
    }

    public function login(Request $request){
        $data = $request->all();
        $data = $this->formatPhone($data);
        if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
            $user = User::where([
                ['phone','like',$data['email']]
            ])->first();
            if($user){
                $data['email']=$user->email;
            }
        }
        $email = $data['email'];
        $pass = $data['password'];
        if (Auth::attempt(['email' => $email, 'password' => $pass], @$data['remember'])) {
            return redirect("account")->with('notice',['class'=>'success','message'=>'Welcome Back to your dashboard']);
        }else{
            return redirect('login')->withErrors([
                'email'=>'Invalid email or password'
            ]);
        }
    }

    protected function formatPhone($data){
        $phone = $data['email'];
        $len = strlen($phone);
        if($len==10){
            $phone = "repl".$phone;
            $phone = str_replace('repl07','+2547',$phone);
        }
        if($len==12){
            $phone = '+'.$phone;
        }
        $data['email']=$phone;
        return $data;
    }

    public function processWithdrawal(User $user,$request_id,Request $request){
        $withdrawal_request = $user->withdrawalRequests()->findOrFail($request_id);
        if($request->method()=='POST'){
            $withdrawal_request->transaction_code = $request->transaction_code;
            $withdrawal_request->status=1;
            $withdrawal_request->save();
            return redirect("user/donations/$user->id")->with('notice',['class'=>'success','message'=>'Withdrawal Request processed successfully']);
        }
        return view("donations.process",[
            'user'=>$user,
            'withdrawal_request'=>$withdrawal_request
        ]);
    }

    public function changeRole(Request $request){
        $user = User::findOrFail($request->id);
        $user->role = $request->role;
        $user->update();
        return redirect()->back()->with('notice',['class'=>'success','message'=>'User Role Changed']);
    }

    public function getAdmins(){
        $users = User::where('role','admin')->paginate(10);
        return view($this->folder.'view',[
            'role'=>'Admin',
            'users'=>$users
        ]);
    }
    public function getEditors(){
        $users = User::where('role','editor')->paginate(10);
        return view($this->folder.'view',[
            'role'=>'Editor',
            'users'=>$users
        ]);
    }
}