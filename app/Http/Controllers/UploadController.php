<?php

namespace App\Http\Controllers;


use App\Http\Requests\uploadrequest;
use App\uploads;
use Illuminate\Http\Request;


class UploadController extends Controller
{
    //
    public function store(Request $request, uploadrequest $UploadRequest){
        $up = new uploads();
        $up->titel=$UploadRequest->titel;
        $up->rede=$UploadRequest->rede;
        $photoName=time() . '.' . $UploadRequest->image->getClientOriginalExtension();
        request()->image->move(public_path('storage/images'),$photoName);
        $up->img_path=$photoName;
        $up->save();
        $id = $up->id;
        $request->session()->put('id',$id);
        $request->session()->put('fromU',true);


        return redirect('wedstrijd/registreer');
    }

}
