<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Achievement extends Model
{
	use SoftDeletes;
	protected $dates=['deleted_at'];
   protected $fillable = ['achievement', 'date','description'];

   public function user()
   {
      return $this->belongsTo(User::class);
   }
}
