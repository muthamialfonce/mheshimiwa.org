<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    //
    protected $fillable = ['inc_type','amount','slug'];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
