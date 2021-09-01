@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{asset('css/style.css') }}" />
    <p class="lead-form">あなたの旅を編集する</p>


   {!! Form::model($trip, ['route' => 'trips.store']) !!}
       
      <div class="item">
        <label class="label">タイトル</label>
        <input class="inputs" type="text" name="title">
      </div>
   
   
      <div class="item">
       <label class="label">コメント(5000字以内)</label>
     　<textarea name="content" rows="5" cols="50"></textarea>
      </div>
      
      <div class="btn-area">
          {!! Form::submit('投稿', ['class' => 'my-button'])!!}
      </div>

   {!! Form::close() !!}
 
 @include("layouts.footer")
@endsection
</html>