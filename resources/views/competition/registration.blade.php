@extends('welcome')
@section('content')
    <div class="block">
        <h1>Wedstrijd</h1>
        <div class="text col-xs-12">
            @if($comp)
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    {!! Form::open(array('url'=>'wedstrijd/registreer/store','files'=>false)) !!}
                    {!! Form::token() !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Naam',['class'=> 'control-label'])  !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('straat', 'straat',['class'=> 'control-label'])  !!}
                            {!! Form::text('straat', null, ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('nummer', 'nummer',['class'=> 'control-label'])  !!}
                            {!! Form::text('nummer', null, ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('stad', 'stad',['class'=> 'control-label'])  !!}
                        {!! Form::text('stad', null, ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('postcode', 'postcode',['class'=> 'control-label'])  !!}
                        {!! Form::text('postcode', null, ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'email',['class'=> 'control-label'])  !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group">
                            {!! Form::submit('Stuur door',['class'=>'btn btn-cara ']) !!}

                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
                @else
            <p>er is momenteel geen wedstrijd actief.</p>
                @endif
        </div>

    </div>


@endsection