<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $fillable = ['role'];
    //
    public function User(){
        return $this->belongsTo(User::class,'role_id','id');
    }
}
