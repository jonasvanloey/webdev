<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class winnaar extends Model
{
    protected $fillable=['registration_id'];
    public function registration(){
        return $this->belongsTo(registration::class);
    }
    //
}
