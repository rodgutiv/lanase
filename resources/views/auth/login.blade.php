@extends('site.main')
@section('title','Dashboard')
@section('content')

<div class="container">
        
    <div class="row mt-150">

            {!! Form::open(['url' => 'login', 'method' => 'POST', 'class' => 'col s11 m6 col-center', 'style' => 'padding:30px' ]) !!}

                <div class="row">
                    
                    <div class="input-field col s12">
                        
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', null, ['class' => 'validate', 'required']) !!}

                    </div>

                    <div class="input-field col s12">
                        
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', null, ['class' => 'validate', 'required']) !!}

                    </div>

                </div>

                <div class="row">
                    
                    <div class="col m12 col-center mt-15">
                    
                        <div class="col s6">
                            <a href="">Olvide mi contraseña</a>
                        </div> 
                        <div class="col s6">
                            {!! Form::submit('Log in', ['class' => 'btn btn-block waves-effect waves-light']) !!}
                        </div>

                    </div>

                </div>

            {!! Form::close() !!}

    </div>

</div>

@endsection
