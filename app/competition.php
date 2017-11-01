<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class competition extends Model
{
    protected $fillable=['user_id','titel','start_date','end_date'];
    public function registration(){
        return $this->belongsToMany(registration::class,'competition_id','id');
    }
    public function User(){
        return $this->hasOne(User::class);
    }
    //
}
