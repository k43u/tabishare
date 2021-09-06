@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{asset('css/style.css') }}" />
    <p class="lead-form">あなたの旅を投稿する</p>


   {!! Form::model($trip, ['route' => 'trips.store']) !!}
       
      <div class="item2">
        <label class="label">タイトル</label>
        <input class="inputs" type="text" name="title">
      </div>
   
   
      <div class="item">
       <label class="label2">コメント(5000字以内)</label2>
     　<textarea name="content"rows="50" cols="100"></textarea>
      </div>
      
      <form action="/upload/image" method="POST" enctype="multipart/form-data">
   　　 @csrf
　　　　<div class="box2">
        <label for="photo">旅の写真</label>
        <input type="file" class="form-control" name="file">
    　　</div>
      </form>
      
      <div class="btn-area">
          {!! Form::submit('投稿', ['class' => 'form-button'])!!}
      </div>

   {!! Form::close() !!}
 
 @include("layouts.footer")
@endsection
</html>