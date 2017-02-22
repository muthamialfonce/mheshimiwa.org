<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Region extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $fillable= ['name'];
      
    /**
     * Get all of the counties for the region.
     */
      public function counties()
      {
          return $this->hasMany(County::class);
      }

      public function user(){
        return $this->belongsTo(User::class);
      }
     
}
