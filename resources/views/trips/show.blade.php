@extends('layouts.app')

@section('content')

 <div class="box3">
    
    <p class="lead-form">{{$trip->title}}</p>
   
    
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