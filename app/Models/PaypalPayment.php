<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaypalPayment extends Model
{
    //
    protected $fillable = ['amount','rate','txn_id','create_time','state','payer_email'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
