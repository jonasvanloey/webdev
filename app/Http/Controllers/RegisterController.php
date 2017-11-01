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
            if ($competition === null) {
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
        var_dump($id);
        $reg = new registration();
        $reg->name = $rrq->name;
        $reg->straat = $rrq->straat;
        $reg->nummer = $rrq->nummer;
        $reg->stad = $rrq->stad;
        $reg->postcode = $rrq->postcode;
        $reg->email = $rrq->email;
//        $reg->competition_id=1;
        $reg->upload_id=$id;
        $reg->save();

        return redirect('/');

    }
    //
}
