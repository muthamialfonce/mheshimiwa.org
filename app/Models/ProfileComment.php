<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class ProfileComment extends Model
{
	use SoftDeletes;
    protected $dates=['deleted_at'];

    //
    protected $fillable = ['subscriber_id','comment'];

    public function subscriber(){
        return $this->belongsTo(Subscriber::class,'subscriber_id');
    }
}
