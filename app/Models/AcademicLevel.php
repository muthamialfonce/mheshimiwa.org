<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicLevel extends Model
{
	use SoftDeletes;
	protected $dates=['deleted_at'];
    protected $fillable = ['name','details','user_id'];

    public function educationLevel()
    {
    	return $this->hasMany(EducationLevel::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
}
