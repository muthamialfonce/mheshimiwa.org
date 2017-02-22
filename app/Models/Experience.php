<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
	use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=['name','description','dateto','datefrom','place'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
