<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable = ['url','website','username'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
