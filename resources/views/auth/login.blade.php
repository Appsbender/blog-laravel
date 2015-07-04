@extends('layouts.main')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

    {!! Form::submit('Login', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@endsection