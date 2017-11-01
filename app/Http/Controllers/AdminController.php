<?php

namespace App\Http\Controllers;
use App\registration;
use App\uploads;
use App\winnaar;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show(){
        $users=DB::table('users')->get();
        $winnaars=winnaar::with('registration')->get()->values()->all();
        $deelnemers = registration::with('upload')->get()->values()->all();
//        var_dump($winnaars);

        return view('admin.index', compact('users','winnaars','deelnemers'));
    }
    public function user(registration $id){
        $d = $id;
        return view('admin.user',compact('d'));
    }
    public function userdelete(registration $id){

        $id->delete();

        return redirect('/wedstrijd');
    }
    //
}
