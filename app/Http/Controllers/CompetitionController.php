<?php

namespace App\Http\Controllers;
use App\Console\Commands\competitioncommand;
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
            $competition= DB::table('competitions')->where('Active','=',1)->get();
            $cid=$competition[0]->id;
            $deelnemers = uploads::whereHas('registration',function ($query) use ($cid){
                 $query->where('competition_id','=',$cid);
            })->with('vote')->get()->values()->all();
            return view('competition.overview', compact('deelnemers'));
        }
        else{
            return redirect('/login');
        }

    }
    public function vote($id){
        if (!Auth::guest()){

            $userid=Auth::id();
            $voted=DB::table('votes')->where('user_id','=',$userid)->where('uploads_id','=',$id)->get();

            if(count($voted) === 0){
                $v = new vote();
                $v->uploads_id=$id;
                $v->user_id=Auth::id();
                $v->save();
            }

            return redirect('/stem');
        }
        else
        {
            return redirect('/');
        }

    }

}
