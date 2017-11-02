<?php

namespace App\Http\Controllers;
use App\uploads;
use App\vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\competition;
use App\registration;

class CompetitionController extends Controller
{
    //
    public function show()
    {
        $competition= DB::table('competitions')->where('Active','=','1')->get();
        $comp=true;
        if(count($competition)===0){
            $comp=false;
        }
        return view('competition.index',compact('comp'));
    }
    public function voteindex(){
        if (!Auth::guest()){

            $deelnemers = uploads::with('registration','vote')->get()->values()->all();
            return view('competition.overview', compact('deelnemers'));
        }
        else{
            return redirect('/register');
        }

    }
    public function vote($id){
        if (!Auth::guest()){
            $v = new vote();
            $v->uploads_id=$id;
            $v->user_id=Auth::id();
            $v->save();
            return redirect('/stem');
        }
        else
        {
            return redirect('/');
        }

    }

}
