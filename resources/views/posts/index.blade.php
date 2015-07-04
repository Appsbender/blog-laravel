@extends('layouts.main')

@section('content')
    @forelse($posts as $post)
        <div class="post-preview">
            <a href="/post/7/bitva_titanov">
                <h2 class="post-title">{!! $post->title !!}</h2>
                <h3 class="post-subtitle">
                    {!! $post->short_description !!}
                </h3>
            </a>
            <p class="post-meta">by Author, 25 May 2015</p>
        </div>
        <hr>
    @empty
        <p>No posts</p>
    @endforelse
@endsection