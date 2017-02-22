<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class County extends Model
{
  use SoftDeletes;
    protected $dates=['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $fillable= ['name','region_id'];
      /**
     * Get the region that comprises the county.
     */
      public function region()
      {
          return $this->belongsTo(Region::class);
      }

         /**
     * Get all of the constituencies for the county.
     */
    public function constituencies()
        {
        return $this->hasMany(Constituency::class);
        }
        /**
         * Get the user that owns the county.
         */
        public function user(){
          return $this->belongsTo(User::class);
        }
    }