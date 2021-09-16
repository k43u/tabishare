@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{asset('css/style.css') }}" />
    <p class="lead-form">あなたの旅を編集する</p>


   {!! Form::model($trip, ['route' => ['trips.update', $trip->id,$trip->title,$trip->content], 'method' => 'put','files' => true]) !!}
     
     
      <div class="item2">
        <label class="label">タイトル</label>
        <input class="inputs" type="text" name="title" value={{$trip->title}}>
      </div>
   
       
      <div class="item">
          <label class="label">コメント(5000字以内)</label>
          <textarea name="content" rows="20" cols="70">{{ $trip->content }}</textarea>
      </div>
      
      
　　　　<div class="box2">
        <label for="photo">旅の写真(50MB以内)</label>
        <input type="file" class="form-control" name="image[]" multiple>
    　　</div>
    　　
    　　
     <div class="btn-wrapper">
     <div class="btn-area">
     {!! Form::submit('更新', ['class' => 'form-button']) !!}
     {!! Form::close() !!}
     </div>
   
   
     <div class="btn-area">
     {!! Form::model($trip, ['route' => ['trips.destroy', $trip->id,], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'form-button']) !!}
     {!! Form::close() !!}
     </div>
    </div>
 
 @include("layouts.footer")
@endsection


