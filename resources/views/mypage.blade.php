@extends('layouts.app')

@section('content')


 <link rel="stylesheet" href="{{asset('css/style.css') }}" />
<h2>マイページ</h2>


<h3><?php $user = Auth::user(); ?>{{ $user->name }} さん</h3>

@include("trips.trips")


@include("layouts.footer")

@endsection


</html>