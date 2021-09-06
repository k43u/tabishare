@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{asset('css/style.css') }}" />
  <p class="lead-form">退会ページ</p>
  
  <p>本当に退会しますか？</p>
@include("layouts.footer")
@endsection
</html>