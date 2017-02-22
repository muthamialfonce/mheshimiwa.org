<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Ward extends Model
{
   use SoftDeletes;
    protected $dates=['deleted_at'];

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $fillable= ['name','constituency_id','user_id'];

   /**
     * Get the constituency that constitutes the ward.
     */
      public function constituency()
      {
          return $this->belongsTo(Constituency::class);
      }

       /**
         * Get the user that owns the ward.
         */
        public function user(){
          return $this->belongsTo(User::class);
        }
}
