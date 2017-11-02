<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    public function upload(){
        return $this->belongsTo(uploads::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public $timestamps = false;
    //
}
