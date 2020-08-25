@extends('app')

@section('title', '記事一覧')

@section('content')
@include('nav')
<div class="container">
    @foreach($breweries as $brewery)
    @include('breweries.card')
    @endforeach
</div>
@endsection
