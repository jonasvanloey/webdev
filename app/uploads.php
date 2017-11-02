<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class uploads extends Model
{
    protected $fillable=['img_path','titel','rede'];
    public function registration(){
        return $this->hasOne(registration::class);
    }
    public $timestamps = false;
    public function vote(){
        return $this->hasMany(vote::class);
    }

    //
}
