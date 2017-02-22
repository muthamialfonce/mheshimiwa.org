<?php
/**
 * Created by PhpStorm.
 * User: iankibet
 * Date: 2016/06/24
 * Time: 5:16 PM
 */

namespace App\Repositories;
use App\Subscriber;
use Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Request;
use App\Http\Requests;

class PaypalRepository
{
    protected $client_id = "AS-M8j6q310ORi94vrtD9VP15d9P5Modhw_TWMmDtZuGNIenY56c3TL_cAslaXvAwBt8nLAYmvJl6HKM";
    protected $secret = "EOJE-ZxfbeAT74MRzsKpRKk79rA-Kmv4T0hQDq31s4rRO2c5mVCmlBVGm2tObYkC1qONPbjXt1CAf9Xd";
    protected $endpoint = "https://api.sandbox.paypal.com";
    protected $cancel_url;
    protected $return_url;

    protected $user;
    public $request;
    public function __construct($request)
    {
        $this->request = $request;
        $this->user = Auth::user();
        $this->cancel_url = action('PaypalController@charge');
        $this->return_url = action('PaypalController@charge');
    }

    public function prepare($amount){
        $user = $this->user;
        $data = '{
             "intent":"sale",
             "redirect_urls":{
                "return_url":"'.$this->return_url.'",
                "cancel_url":"'.$this->cancel_url.'"
             },
            "payer":{
                 "payment_method":"paypal"
            },
            "transactions":[
                {
             "amount":{
             "total":"'.$amount.'",
             "currency":"USD",
             "details": {
                    "subtotal": "'.$amount.'",
                    "tax": "0.00",
                    "shipping": "0.00"
                }
             },
            "description":"Mheshimiwa Account Payment",
            "item_list": {
                "items":[
                    {
                        "quantity":"1",
                        "name":"Mheshimiwa Political Account Paymnent",
                        "price":"'.$amount.'",
                        "sku":"'.$user->id.'",
                        "currency":"USD"
                    }
                ]
            }
          }
         ]
    }';
        $data = stripslashes($data);

        $header = array(
            'Content-Type:application/json',
            'Authorization: Bearer '.$this->getAccessToken(),
        );
        $url = $this->endpoint."/v1/payments/payment";
        $response = $this->getCurl($url,$data,"POST",$header);
        foreach($response->links as $link){
            if($link->rel=='approval_url'){
                ?>
                <p style="color: green">Redirecting. Please wait...</p>
                <meta http-equiv="refresh" content="0;url=<?php echo $link->href; ?>">
                <?php
                die();
            }
        }
    }

    public function prepareDonation(User $user,Subscriber $subscriber,$amount){
        $this->cancel_url = action('DonationsController@charge',['id'=>$user->id]);
        $this->return_url = action('DonationsController@charge',['id'=>$user->id]);

        $data = '{
             "intent":"sale",
             "redirect_urls":{
                "return_url":"'.$this->return_url.'",
                "cancel_url":"'.$this->cancel_url.'"
             },
            "payer":{
                 "payment_method":"paypal"
            },
            "transactions":[
                {
             "amount":{
             "total":"'.$amount.'",
             "currency":"USD",
             "details": {
                    "subtotal": "'.$amount.'",
                    "tax": "0.00",
                    "shipping": "0.00"
                }
             },
            "description":"Donation to '.$user->name.'",
            "item_list": {
                "items":[
                    {
                        "quantity":"1",
                        "name":"Donation to '.$user->name.'",
                        "price":"'.$amount.'",
                        "sku":"'.$subscriber->id.'",
                        "currency":"USD"
                    }
                ]
            }
          }
         ]
    }';
        $data = stripslashes($data);

        $header = array(
            'Content-Type:application/json',
            'Authorization: Bearer '.$this->getAccessToken(),
        );
        $url = $this->endpoint."/v1/payments/payment";
        $response = $this->getCurl($url,$data,"POST",$header);
        foreach($response->links as $link){
            if($link->rel=='approval_url'){
                ?>
                <p style="color: green">Redirecting. Please wait...</p>
                <meta http-equiv="refresh" content="0;url=<?php echo $link->href; ?>">
                <?php
                die();
            }
        }
    }

    public function charge($payerID,$paymentID){
        $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->getAccessToken()
        );
        $data = '{ "payer_id" : "'.$payerID.'" }';
        $url = $this->endpoint.'/v1/payments/payment/'.$paymentID.'/execute/';
        $response = $this->getCurl($url,$data,"POST",$header);
        return $response;
    }

    public function getAccessToken(){
        $request = $this->request;
        if($request->session()->has('access_token')){
            $access_token = $request->session()->get('access_token');
        }else{
            $url = "https://$this->client_id:$this->secret@api.sandbox.paypal.com/v1/oauth2/token?grant_type=client_credentials";
//            $url = "https://$this->client_id:$this->secret@api.paypal.com/v1/oauth2/token?grant_type=client_credentials";
            $creds = $this->getCurl($url);
            $access_token = $creds->access_token;
            $request->session()->put(['access_token'=>$access_token]);
        }
        return $access_token;



    }

    protected function getCurl($url,$data=null, $method="POST", $header=null){
        if(!$header){
            $header = array(
                'Accept: application/json',
                'Accept-Language: en_US',
            );
        }
//        var_dump($url);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl,CURLOPT_HTTPHEADER, $header);
        $content = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $json_response = null;
        if($status==200 || $status==201){
            $json_response = json_decode($content);
        }else{
            dd($content,$status);
        }
        return $json_response;
    }
}