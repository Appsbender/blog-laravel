@extends('layouts.main')

@section('content')
    @include('errors.list')

    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('email') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password') !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
    </div>

    <div class="form-group">
        <label>
            {!! Form::checkbox('remember') !!} Remember me
        </label>

    </div>

    <div class="row">
        <div class="col-md-6">
            {!! Form::submit('Login', ['class' => 'btn btn-default']) !!}
        </div>
        <div class="col-md-6">
            <a href="/auth/register" class="btn btn-default pull-right">Create new account</a>
        </div>
    </div>

    {!! Form::close() !!}


@endsection