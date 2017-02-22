<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpesaPayment extends Model
{
    protected $fillable = ['username', 'password', 'account_number', 'business_number', 'currency', 'amount','first_name', 'middle_name', 'last_name', 'sender_phone', 'transaction_type', 'internal_transaction_id', 'transaction_reference', 'transaction_timestamp', 'service_name'];

    public function user(){
        return $this->belongsTo(User::class,'sender_phone','phone');
    }
}
