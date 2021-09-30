@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            {{Auth::user()->name}}<br/>
            {{Auth::user()->email}}<br/>
            {{Auth::user()->created_at}}<br/>

        </div>
        <div class="col-md-8">
            <table border="1" class="table">
                <tr>
                    <th>{{ __('message.stt') }}</th>
                    <th>{{ __('message.name') }}</th>
                    <th>{{ __('message.email') }}</th>
                    <th>{{ __('message.action' )}}</th>
                </tr>
                @foreach ($users as $user)
                @if ($user->id != Auth::id())
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{ route('users.show', $user) }}">{{  __('message.detail') }}</a></td>
                </tr>
                @endif
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
