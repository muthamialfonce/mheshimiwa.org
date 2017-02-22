<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithrawalRequest extends Model
{
    //
    protected $fillable = ['amount','method','account'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
