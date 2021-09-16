@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{asset('css/style.css') }}" />
    <p class="lead-form">あなたの旅を投稿する</p>

   {!! Form::model($trip, ['route' => 'trips.store', 'files' => true]) !!}
       
      <div class="item2">
        <label class="label">タイトル(20字以内）</label>
        <input class="inputs" type="text" name="title">
      </div>
   
   
      <div class="item">
       <label class="label2">コメント(5000字以内)</label2>
     　<textarea name="content" rows="20" cols="70"></textarea>
      </div>
      
　　<div class="box2">
        <label for="photo">旅の写真(50MB以内)</label>
        <input type="file" class="form-control" name="image[]" multiple>
　　</div>
　　
      <div class="btn-area">
          {!! Form::submit('投稿', ['class' => 'form-button'])!!}
      </div>

   {!! Form::close() !!}
 
 @include("layouts.footer")
@endsection
</html>