<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Agenda extends Model
{
	use SoftDeletes;
	protected $dates=['deleted_at'];
    //
    protected $fillable = ['title','description'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
