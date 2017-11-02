@extends('welcome')
@section('content')


    <div class="block">
        <h1>start wedstrijden</h1>
        <div class="text">
            <div class="col-xs-8 col-xs-offset-2 floatnone">
                {!! Form::open(array('url'=>'admin/wedstrijd/start','files'=>false)) !!}
                {!! Form::token() !!}
                <div class="form-group">
                    {!! Form::label('lengte', 'Lengte per periode in dagen',['class'=> 'control-label'])  !!}
                    {!! Form::text('lengte', null, ['class' => 'form-control']) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('email', 'email verantwoordelijke',['class'=> 'control-label'])  !!}
                    {!! Form::text('email', null, ['class' => 'form-control','required','email']) !!}

                </div>
                <div class="form-group">
                    {!! Form::submit('Start',['class'=>'btn btn-cara ']) !!}

                </div>
                {!! Form::close() !!}
            </div>


        </div>


    </div>
@endsection