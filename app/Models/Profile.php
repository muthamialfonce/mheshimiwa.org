<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Profile extends Model
{

	use SoftDeletes;
    protected $dates=['deleted_at'];

 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['user_id','region_id','county_id','constituency_id',
                         'ward_id','fname','lname','surname','id_number','dob'];


	/**
	 * A profile belongs to a user
	 *
	 * @return mixed
	 */

            public function user()
	{
		return $this->belongsTo('User');
	}

	public function county(){
		return $this->belongsTo(County::class);
	}

	public function ward(){
		return $this->belongsTo(Ward::class);
	}

	public function constituency(){
		return $this->belongsTo(Constituency::class);
	}
}
