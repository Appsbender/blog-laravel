@extends('layouts.main')

@section('content')
    <div class="post-block">
        {!! $post->description !!}
        <hr/>
        Categories:
        @foreach($post->categories as $key => $category)
            <a href="/categories/{!! $category->id !!}">{!! $category->name !!}</a>{!! $key < count($post->categories)-1 ? ',' : '' !!}
        @endforeach
        <br/>
        Tags:
        @foreach($post->tags as $key => $tag)
            <a href="/tags/{!! $tag->id !!}">{!! $tag->name !!}</a>{!! $key < count($post->tags)-1 ? ',' : '' !!}
        @endforeach
        <hr/>
    </div>
    <div class = "share_block">
        <div class = "share_text">Share it with friends: </div>
        <div class="share42init" data-url="/posts/{!! $post->id !!}" data-title="{!! $post->title !!}" data-description="{!! $post->short_description !!}"></div>
        <hr>
    </div>
    <h2 class="section-heading">Comments:</h2>

    <div class="comments">
        @forelse($post->comments as $comment)
            <div class="comment">
                <img class="avatar" src="http://www.gravatar.com/avatar/592cbfa57298b60974bac05f6428c1b5?r=r&amp;s=50" alt="">
                <div class="header">
                    {!! $comment->username !!}
                    <span class="pull-right">
                        {!! $comment->created_at->format('d M Y') !!}
                    </span>
                </div>
                <div class="text">{!! $comment->text !!}</div>
            </div>
        @empty
            Empty
            <hr/>
        @endforelse
    </div>

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
        {!! Form::label('You URL') !!}
        {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'You URL']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Comment') !!}
        {!! Form::textarea('text', null, ['class' => 'form-control', 'placeholder' => 'Comment']) !!}
    </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@endsection

@section('scripts')
    @parent
    <script src="/js/share42/share42.js"></script>
@endsection