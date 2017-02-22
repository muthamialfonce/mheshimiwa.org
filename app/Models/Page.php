<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    use SoftDeletes;
    // use Billable;
    protected $dates=['deleted_at'];

    protected $fillable = ['user_id','menu_label','page_type','slug','keywords','position','title','meta_description','page_content'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
