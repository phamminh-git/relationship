@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            {{$user->name}}<br/>
            {{$user->email}}<br/>
            {{$user->created_at}}<br/>
            @if (Auth::id() == $user->id)
            @elseif (Auth::user()->following($user))
                <input type="hidden" name="" value="{{$user->id}}" id="followed_id">
                <button id="btn-unfollow">{{ __('message.unfollow') }}</button>
            @else
                <input type="hidden" name="" value="{{$user->id}}" id="followed_id">
                <button id="btn-follow">{{ __('message.follow') }}</button>
            @endif
        </div>
        <div class="col-md-8">
            <ul class="list-group">
                @foreach ($user->articles as $article)
                @include('article._article', $article)
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('js')
@translations
<script src="{{ asset('js/relationship.js') }}" defer></script>
@endsection
