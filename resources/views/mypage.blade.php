@extends('layouts.app')

@section('content')

 <link rel="stylesheet" href="{{asset('css/style.css') }}" />
<h2>マイページ<br><?php $user = Auth::user(); ?>
{{ $user->name }} さん</h2>

@include("trips.trips")



@include("layouts.footer")
@endsection

</html>