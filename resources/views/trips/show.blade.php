@extends('layouts.app')

@section('content')

  <div class="box14">
    <?php $user = Auth::user(); ?>
    投稿者 {{ $user->name }}
    <p>{{$trip->title}}</p>
  </div>
　
    <div class="box18">
    <p>{{ $trip->content }}</p>
    </div>   

@include("layouts.footer")
@endsection