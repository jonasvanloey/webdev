@extends('welcome')
@section('content')
    <div class="block">
        <h1>Overzicht</h1>
        <div class="text">

            @foreach($deelnemers as $d)
                <div class="col-xs-12 deelnemer-block text">
                    <div class="col-xs-4">

                        <img src="{{ asset('storage/images/' .$d->img_path) }}" alt="" style="max-width: 80%">
                    </div>
                    <div class="col-xs-8 .deelnemer-block">
                        <h4>{{$d->titel}}</h4>
                        <p>{{$d->rede}}</p>
                        <p>{{$d->registration->name}}</p>
                        <p>stemmen: {{count($d->vote)}}</p>
                        <a href="/vote/{{$d->id}}"><span>stem</span></a>
                    </div>
                </div>
            @endforeach


        </div>
    </div>


@endsection