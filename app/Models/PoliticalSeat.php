<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class PoliticalSeat extends Model
{

//	use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable = ['name','description','rank','political_level_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function politics(){
        return $this->hasMany(Politic::class);
    }
    public function rate(){
        return $this->hasOne(Rate::class);
    }
    public function politicalLevel(){
        return $this->belongsTo(PoliticalLevel::class,'political_level_id');
    }
}
