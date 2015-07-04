@extends('layouts.main')

@section('content')
    @include('errors.list')

    {!! Form::model($category) !!}

    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>

    {!! Form::submit('Update', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@endsection