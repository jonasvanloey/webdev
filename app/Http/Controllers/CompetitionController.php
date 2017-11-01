<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\competition;

class CompetitionController extends Controller
{
    //
    public function show()
    {
        $competition= DB::table('competitions')->where('Active','=','1')->get();
        $comp=true;
        if($competition===null){
            $comp=false;
        }
        return view('competition.index',compact('comp'));
    }

}
