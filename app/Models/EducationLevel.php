<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class EducationLevel extends Model
{

	use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable = ['name','joined','completed','achievement','academic_level_id'];

    public function user()
     {
        return $this->belongsTo(User::class);
     }

      public function academic_level()
        {
        	return $this->belongsTo(AcademicLevel::class);
        }
}
