@extends('layouts.main')

@section('stylesheets')
    @parent
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    @include('errors.list')

    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('categories') !!}
        {!! Form::select('categoriesList[]', $categories, null, ['class' => 'form-control', 'placeholder' => 'Categories', 'multiple']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tags') !!}
        {!! Form::select('tagsList[]', $tags, null, ['class' => 'form-control', 'placeholder' => 'Tags', 'multiple']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('short_description') !!}
        {!! Form::textarea('short_description', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Short description']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('seo_description') !!}
        {!! Form::textarea('seo_description', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'SEO description']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
    </div>

    {!! Form::submit('Create', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@endsection

@section('scripts')
    @parent
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <script type="text/javascript">
        $('select').select2({
            tags: true
        });
    </script>
@endsection