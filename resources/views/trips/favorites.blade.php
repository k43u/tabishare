@extends('layouts.app')

@section('content')

 <link rel="stylesheet" href="{{asset('css/style.css') }}"/>
<h2>お気に入りの旅一覧<br>

@include("trips.trips")



@include("layouts.footer")
@endsection

</html>













        