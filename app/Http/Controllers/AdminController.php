<?php

namespace App\Http\Controllers;
use App\competition;
use App\Http\Requests\WedstrijdRequest;
use App\registration;
use App\uploads;
use App\winnaar;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show(){
        $userid = Auth::id();
        $role=DB::table('users')->where('id','=',$userid)->get();
        if($role[0]->role_id==1){
        $competition= DB::table('competitions')->where('Active','=','1')->get();

        $comp=true;
        if(count($competition)===0){
            $comp=false;
        }
        $users=DB::table('users')->get();
        $winnaars=winnaar::with('registration')->get()->values()->all();
        $deelnemers = registration::with('upload')->get()->values()->all();
//        var_dump($winnaars);

        return view('admin.index', compact('users','winnaars','deelnemers','comp'));
        }
        else
        {
            return redirect('/');
        }
    }
    public function user(registration $id){
        $userid = Auth::id();
        $role=DB::table('users')->where('id','=',$userid)->get();
        if($role[0]->role_id==1){
        $d = $id;
        return view('admin.user',compact('d'));
        }
        else
        {
            return redirect('/');
        }
    }
    public function userdelete(registration $id){
        $userid = Auth::id();
        $role=DB::table('users')->where('id','=',$userid)->get();
        if($role[0]->role_id==1){
            $id->delete();

            return redirect('/admin');
        }
        else
        {
            return redirect('/');
        }
    }
    public function cpanel(){
        $userid = Auth::id();
        $role=DB::table('users')->where('id','=',$userid)->get();
        if($role[0]->role_id==1){

            return view('admin.wedstrijd');
        }
        else
        {
            return redirect('/');
        }
    }
    public function start(WedstrijdRequest $wr){
        $userid = Auth::id();
        $role=DB::table('users')->where('id','=',$userid)->get();
        if($role[0]->role_id==1){

            $competition= DB::table('competitions')->where('Active','=','1')->get();

            if(count($competition)===0) {

                $w = new competition();
                $w->titel = 'wedstrijd';
                $today = date('Y-m-d');
                $w->start_date = $today;
                $next = date('Y-m-d', strtotime($today . ' + ' . $wr->lengte . ' days'));
                $w->end_date = $next;
                $w->email=$wr->email;
                $w->Active = 1;
                $w->save();

            for ($i = 0; $i < 3; $i++) {
                $w = new competition();
                $w->titel = 'wedstrijd';
                $today = date('Y-m-d');
                $w->start_date = $next;
                $next = date('Y-m-d', strtotime($next . ' + ' . $wr->lengte . ' days'));
                $w->end_date = $next;
                $w->email=$wr->email;
                $w->Active = 0;
                $w->save();

            }
        }
            return redirect('/admin');
        }
        else
        {
            return redirect('/');
        }
    }
    public function excel(){
        $userid = Auth::id();
        $role=DB::table('users')->where('id','=',$userid)->get();
        if($role[0]->role_id==1){


            $file = "overzicht";
            $output="";


            $column_name = array('naam','adress','stad','email');

            foreach ($column_name as $caname) {
                $output .= $caname . "\t";
            }
            print $output;

            $registrations=DB::table('registrations')->where('deleted_at','=',null)->get();

            foreach ($registrations as $r)
            {

                $unewline = "\r\n";
                if (strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'win')) {
                    $unewline = "\r\n";
                } else if (strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mac')) {
                    $unewline = "\r";
                } else {
                    $unewline = "\n";
                }
                $name = $r->name;
                $adress = $r->straat.' '.$r->nummer;
                $stad = $r->stad.' '.$r->postcode;
                $email=$r->email;


                $output1= $unewline. strip_tags($name)."\t" .strip_tags($adress)."\t". strip_tags($stad). "\t". strip_tags($email);
                print $output1;



            }
            $filename = $file . "_" . date('Y-m-d_H-i', time());
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
            header('Cache-Control: max-age=0'); }
        else
        {
            return redirect('/');
        }

    }

    //
}
