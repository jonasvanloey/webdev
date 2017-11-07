@extends('welcome')
@section('content')


<div class="block">
    <h1>admin panel</h1>
    <div class="text">
        <div class="row">
            <div class="col-xs-5 col-xs-offset-1 text admin-block">
                <h3>Users</h3>
                <table style="width: 70%; margin-left: 30%; text-align: left">
                    <thead>
                    <th>naam</th>
                    <th>rol</th>
                    </thead>
                    <tbody >
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role_id}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
            <div class="col-xs-5  text admin-block">
                <h3>Winnaars</h3>
                <table style="width: 70%;text-align: left">
                    <thead>
                    <th>naam</th>
                    <th>competitie nr.</th>
                    </thead>
                    <tbody >
                    @foreach($winnaars as $w)
                        <tr>
                            <td>{{$w->registration->name}}</td>
                            <td>{{$w->id}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h3>Deelnemers</h3>
                @foreach($deelnemers as $d)
                    <div class="col-xs-12 deelnemer-block">
                        <div class="col-xs-4">

                            <img src="{{ asset('storage/images/' .$d->img_path) }}" alt="" style="max-width: 80%">
                        </div>
                        <div class="col-xs-8 .deelnemer-block">
                            <h4>{{$d->titel}}</h4>
                            <p>{{$d->rede}}</p>
                            <p>{{$d->registration->name}}</p>
                            <a href="admin/deelnemer/{{$d->registration->id}}" class="btn btn-primary">bekijk de deelnemer</a>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>

        @if(!$comp)
        <a href="/admin/wedstrijd" class="btn btn-cara">Start de wedstrijden</a>
            @else
        <p>de wedstrijd is gestart</p>
            @endif
        <a href="/admin/excel" class="btn btn-cara gr">download excel</a>
    </div>

</div>
@endsection