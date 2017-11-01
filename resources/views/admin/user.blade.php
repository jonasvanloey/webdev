@extends('welcome')
@section('content')


    <div class="block">
        <h1>{{$d->name}}</h1>
        <div class="text">
            <p><b>email: </b>{{$d->email}}</p>
            <p><b>adres: </b>{{$d->straat}} {{$d->nummer}} {{$d->stad}} {{$d->postcode}}</p>
            <a href="/admin/deelnemer/{{$d->id}}/del" class="btn btn-cara">disqualificeer deze deelnemer</a>

        </div>

    </div>
@endsection