<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use Illuminate\Database\Eloquent\SoftDeletes;

class PoliticalEvent extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable = ['title','place','event_time','about'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
