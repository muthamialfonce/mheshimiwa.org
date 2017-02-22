<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    protected $fillable = ['image','description'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
