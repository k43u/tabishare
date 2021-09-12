@extends('layouts.app')

@section('content')

 <div class="box3">
    <?php $user = Auth::user(); ?>
    <p>投稿者 {{ $user->name }}</P>
    <h3>{{$trip->title}}</h3>
   
    
    <div class="scrolling-wrapper">
    <div class="image-wrap">
    @if (count($trip_images) > 0)
    @foreach ($trip_images as $trip_image)
    <img src="{{ $trip_image->image_url }}">
    @endforeach
    @endif
    </div>
    </div>
    
     <p>{{ $trip->content }}</p>
    
 </div>   

    
    
    </div>   

 
   
  
@include("layouts.footer")
@endsection