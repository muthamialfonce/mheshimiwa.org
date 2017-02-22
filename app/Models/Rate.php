<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rate extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['amount'];
    protected $dates = ['deleted_at'];

    public function seat(){
        return $this->belongsTo(PoliticalSeat::class,'political_seat_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
