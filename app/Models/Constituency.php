<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Constituency extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable= ['name','county_id','user_id'];

         // Other Eloquent Properties...

    /**
     * Get all of the wards for each constituency.
     */

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

       /**
     * Get the County that constitutes the constituency.
     */
    public function county()
    {
        return $this->belongsTo(County::class);
    }
     /**
         * Get the user that owns the constituency.
         */
        public function user(){
          return $this->belongsTo(User::class);
        }
}

