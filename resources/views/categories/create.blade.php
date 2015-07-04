@extends('layouts.main')

@section('content')
    @include('errors.list')

    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>

    {!! Form::submit('Create', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@endsection