@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">

    <div class="blog-post">
        <h2 class="blog-post-title">
            {{ $post->title }}
        </h2>

        <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>

        <p>
            {{ $post->body }}
        </p>
    </div><!-- /.blog-post -->

    <!-- display comments -->
    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <strong>({{ $comment->created_at->diffForHumans() }}) {{ $comment->user->name }}:&nbsp</strong>
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
    </div>

    @if (Auth::check())
        <div class="card">
            <div class="card-block">
                <form method='POST' action="/posts/{{ $post->id }}/comments">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="body" class="form-control" placeholder="Your comment here"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>

                    @include('layouts.error')
                </form>
            </div>
        </div>
    @endif
</div>
@endsection