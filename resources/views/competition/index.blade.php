@extends('welcome')
@section('content')
    <div class="block">
        <h1>Wedstrijd</h1>
        <div class="text col-xs-12">
            @if($comp)
            <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                {!! Form::open(array('url'=>'wedstrijd/store','files'=>true)) !!}
                {!! Form::token() !!}
                    <div class="form-group">
                        {!! Form::label('image','Upload hier een foto van jou meest originele manier om cara te drinken.',['class'=>'control-label']) !!}
                        {!! Form::file('image',['required','image']) !!}
                       </div>
                    <div class="form-group">
                        {!! Form::label('titel', 'geef deze manier van drinken een naam.',['class'=> 'control-label'])  !!}
                        <div class=>
                            {!! Form::text('titel', null, ['class' => 'form-control','required']) !!}
                        </div>

                    </div>
                    <div class="form-group">
                        {!! Form::label('rede', 'Vul hier in waarom deze manier van drinken zo uniek is',['class'=> ' control-label'])  !!}
                        <div class="">
                            {!! Form::textarea('rede', null,['size' => '90x3', 'class' => 'form-control','required','string']) !!}
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="">
                            {!! Form::submit('Stuur door',['class'=>'btn btn-cara ']) !!}
                        </div>

                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
                @else
            <p>Er is momenteel geen wedstrijd actief.</p>
                @endif
        </div>

    </div>


@endsection