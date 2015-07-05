@extends('layouts.main')

@section('content')
    @include('errors.list')

    {!! Form::model($category, ['url' => ['/categories', $category->id], 'method' => 'PATCH']) !!}

    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>

    {!! Form::submit('Update', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@endsection