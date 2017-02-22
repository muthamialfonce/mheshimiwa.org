<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaypalDonation extends Model
{
    //
    //
    protected $fillable = ['amount','rate','txn_id','create_time','state','payer_email','subscriber_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function donor(){
        return $this->belongsTo(Subscriber::class,'subscriber_id');
    }
}
