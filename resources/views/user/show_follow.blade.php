@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            {{$user->name}}<br/>
            {{$user->email}}<br/>
            {{$user->created_at}}<br/>

        </div>
        <div class="col-md-8">
            <ul>
                @foreach ($users as $user)
                @include('user._user', $user)
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
