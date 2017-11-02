<?php

namespace App\Http\Controllers;
use App\Http\Requests\uploadrequest;
use App\Http\Requests\RegisterRequest;
use App\registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function show(Request $request){
        $id=$request->session()->pull('fromU');
        var_dump($id);
        if($id) {
            $competition = DB::table('competitions')->where('Active', '=', '1')->get();
            $comp = true;
            if (count($competition)===0) {
                $comp = false;
            }
            return view('competition.registration', compact('comp'));
        }
        else{
            return redirect('wedstrijd');
        }

    }
    public function store(Request $request,RegisterRequest $rrq){
        $id=$request->session()->pull('id');

        $reg = new registration();
        $reg->name = $rrq->name;
        $reg->straat = $rrq->straat;
        $reg->nummer = $rrq->nummer;
        $reg->stad = $rrq->stad;
        $reg->postcode = $rrq->postcode;
        $reg->ip_address = $request->getClientIp();
        $reg->email = $rrq->email;
        $competition = DB::table('competitions')->where('Active', '=', '1')->get();
        var_dump($competition);
        $reg->competition_id=$competition[0]->id;
        $reg->upload_id=$id;
        $reg->save();

        return redirect('/');

    }
    //
}
