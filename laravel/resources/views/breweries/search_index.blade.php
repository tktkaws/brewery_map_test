@extends('app')

@section('title', '検索結果一覧')

@section('content')
@include('nav')
<div class="container">
    @foreach($breweries as $brewery)
    @include('breweries.card')
    @endforeach
</div>
@endsection
