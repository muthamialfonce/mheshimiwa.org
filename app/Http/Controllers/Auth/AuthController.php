<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Repositories\RoleRepository;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'gender'=>'required|max:255',
             'phone'=>['required','unique:users','regex:/(\+?254|0){1}[7]{1}([0-9]{1}[0-9]{1}|[9]{1}[0-2]{1})[0-9]{6}/'],
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data = $this->formatPhone($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'gender'=>$data['gender'],
            'phone'=>$data['phone'],
            'password' => bcrypt($data['password']),
        ]);
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
}
