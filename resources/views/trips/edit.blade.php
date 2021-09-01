@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{asset('css/style.css') }}" />
    <p class="lead-form">あなたの旅を編集する</p>


   {!! Form::model($trip, ['route' => ['trips.update', $trip->id,$trip->title,$trip->content], 'method' => 'put']) !!}
     
      <div class="item">
        <label class="label">タイトル</label>
        <input class="inputs" type="text" name="title" value={{$trip->title}}>
      </div>
   
       
      <div class="item">
          <label class="label">コメント(5000字以内)</label>
          <textarea name="content" rows="5" cols="50">{{ $trip->content }}</textarea>
      </div>

     {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
   {!! Form::close() !!}
   
    {!! Form::model($trip, ['route' => ['trips.destroy', $trip->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
       

 
 @include("layouts.footer")
@endsection
</html>

