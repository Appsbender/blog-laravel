@extends('layouts.main')

@section('content')
    @forelse($categories as $category)
        <div class="post-preview">
            <a href="/categories/{!! $category->id !!}">
                <h2 class="post-subtitle">
                    {!! $category->name !!} <span class="label label-default pull-right">{!! count($category->posts) !!}</span>
                </h2>
            </a>
        </div>
        <hr>
    @empty
        <p>Empty</p>
    @endforelse
@endsection