@extends('app')

@section('title', $user->name . 'のフォロー中')

@section('content')
@include('nav')
<div class="container">
    @include('users.user')
    @include('users.tabs', ['hasBreweries' => false, 'hasLikes' => false])
    @foreach($followings as $person)
    @include('users.person')
    @endforeach
</div>
@endsection