@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div style="display: flex;">
                <div><a href="{{ route('showimage', $user->id) }}"><img class="image" src="{{asset('storage/'.$user->avatar)}}" alt="" style="width: 80px;height: 80px;"></a></div>
                <div style="margin-left: 10px;">
                    {{$user->name}}<br/>
                    {{$user->email}}<br/>
                    {{$user->created_at}}
                </div>
            </div>

            <div class="stats">
                <a href="{{ route('users.following', $user->id) }}">
                    <strong class="stat">{{$user->num_following}} {{ __('message.following') }}</strong>
                </a>
                <a href="{{ route('users.followers', $user->id) }}">
                    <strong class="stat">{{$user->num_followers}} {{ __('message.followers') }}</strong>
                </a>
            </div>

            @include('article.create')

        </div>
        <div class="col-md-8">
            @include('article.index', ['articles' => $user->articles])
        </div>
    </div>
</div>
@endsection
