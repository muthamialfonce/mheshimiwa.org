<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class PoliticalParty extends Model
{

    use SoftDeletes;
    protected $dates=['deleted_at'];

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','abbreviation','active','slogan','about','year_founded'];

    public function politics(){
        return $this->hasMany(Politic::class);
    }
}
