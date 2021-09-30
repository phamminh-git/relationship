@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            {{$article->category->name}}<br/>
            {{$article->title}}<br/>
            {{$article->content}}<br/>
            {{$article->created_at}}<br/>
            @if (Auth::user()->following($article->user))
            <button><a href="{{ route('comments.create', $article->id) }}">Comment</a></button>
            @endif
        </div>
        <div class="col-md-8">
            <ul class="list-group">
                @foreach ($article->comments as $comment)
                @include('comment.show',['comment'=>$comment, 'id'=>$article->id])
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
