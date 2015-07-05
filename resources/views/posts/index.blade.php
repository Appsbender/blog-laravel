@extends('layouts.main')

@section('content')
    @forelse($posts as $post)
        <div class="post-preview">
            <a href="/posts/{!! $post->id !!}">
                <h2 class="post-title">{!! $post->title !!}</h2>
                <h3 class="post-subtitle">
                    {!! $post->short_description !!}
                </h3>
            </a>
            <p class="post-meta">by {!! $post->user->username !!}, {!! $post->created_at->format('d M Y') !!}</p>
        </div>
        <hr>
    @empty
        <p>No posts</p>
    @endforelse
@endsection