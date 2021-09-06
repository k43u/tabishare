@extends('layouts.app')

@section('content')

    <div class="box3">
    <?php $user = Auth::user(); ?>
    <p>投稿者 {{ $user->name }}</P>
    <h3>{{$trip->title}}</h3>
    
    @foreach ($user_images as $user_image)
        <img src="{{ $user_image['image_url'] }}">
        <br>
    @endforeach
　
   
    <p>{{ $trip->content }}</p>
    </div>   

@include("layouts.footer")
@endsection