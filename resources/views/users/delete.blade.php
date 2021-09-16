@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{asset('css/style.css') }}" />
  <p class="lead-form">退会ページ</p>
  
  <p>本当に退会しますか？</p>
  <div class="btn-delete">
    
    {!! Form::submit('退会する', ['class' => 'delete-button'])!!}
   
  </div>
  
  
@include("layouts.footer")
@endsection
</html>