@extends('layouts.main')

@section('content')
    @include('errors.list')

    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('username') !!}
        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password') !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm']) !!}
    </div>

    {!! Form::submit('Register', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@endsection