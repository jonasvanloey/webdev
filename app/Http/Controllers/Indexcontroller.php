<?php

namespace App\Http\Controllers;

use App\winnaar;
use App\competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class Indexcontroller extends Controller
{
    public function show()
    {
        $userid = Auth::id();
        $role=DB::table('users')->where('id','=',$userid)->get();
        $ad=false;
        if($role[0]->role_id==1){
           $ad=true;
        }
        $competition= DB::table('competitions')->where('Active','=','1')->get();


        $comp=true;
        if(count($competition)===0){
            $comp=false;
        }
        $winnaars=winnaar::with('registration')->get()->values()->all();
        return view('entrance.index',compact('winnaars','comp','ad'));
    }

    //
}
