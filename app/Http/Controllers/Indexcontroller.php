<?php

namespace App\Http\Controllers;

use App\winnaar;
use App\competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Indexcontroller extends Controller
{
    public function show()
    {
        $competition= DB::table('competitions')->where('Active','=','1')->get();

        $comp=true;
        if(count($competition)===0){
            $comp=false;
        }
        $winnaars=winnaar::with('registration')->get()->values()->all();
        return view('entrance.index',compact('winnaars','comp'));
    }

    //
}
