<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class PartyManifesto extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable = ['title','description','political_party_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function party(){
        return $this->belongsTo(PoliticalParty::class);
    }
}
