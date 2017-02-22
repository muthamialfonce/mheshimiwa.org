<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class PoliticalLevel extends Model
{
//    use SoftDeletes;
//    protected $dates=['deleted_at'];

    protected $fillable = ['name','description','rank'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function seats(){
        return $this->hasMany(PoliticalSeat::class);
    }
}
