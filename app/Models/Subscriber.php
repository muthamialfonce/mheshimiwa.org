<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;



class Subscriber extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable = ['email','name','phone','ward_id'];


    public function paypalDonations(){
        return $this->hasMany(PaypalDonation::class);
    }

    public function mpesaDonation(){
        return $this->hasMany(MpesaDonation::class);
    }
}
