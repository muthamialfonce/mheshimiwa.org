<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Politic extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];


    protected $fillable = ['political_party_id','political_seat_id','won','year','comments','ended'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function party(){
        return $this->belongsTo(PoliticalParty::class,'political_party_id');
    }

    public function seat(){
        return $this->belongsTo(PoliticalSeat::class,'political_seat_id');
    }
}
