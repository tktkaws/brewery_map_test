@extends('app')

@section('title', '記事詳細')

@section('content')
@include('nav')
<div class="container">
    @include('breweries.card')

    <div id="map-container-google-1" class="z-depth-1-half map-container">
        <iframe
            src='https://www.google.com/maps/embed/v1/search?key=AIzaSyBrHF1_NfV2WYVdh0PoZKD3qf52MXJwEx8&q={{ $brewery->name }}'
            width='100%' height='480' frameborder='0' style="border:0">
        </iframe>
    </div>
</div>
@endsection