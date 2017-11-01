<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class registration extends Model
{
    use SoftDeletes;
    protected $fillable=['name','straat','nummer','stad','postcode','email'];
    public function winnaar(){
        return $this->hasOne(winnaar::class);
    }
    public function upload(){
        return $this->belongsTo(uploads::class);
    }
    public function competition(){
        return $this->hasOne(competition::class);
    }
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    //
}
