@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{asset('css/style.css') }}" />
    <p>ログイン</p>

<div class="form-wrapper">
   {!! Form::open(['route' => 'login.post']) !!}
   
  <div class="item">
    <label class="label">メールアドレス</label>
    <input class="inputs" type="email" name="email">
  </div>
  
  <div class="item">
    <label class="label">パスワード<br>(アルファベット8文字以上)</label>
    <input class="inputs" type="password" name="password">
  </div>
  

  <div class="btn-area">
    {!! Form::submit('ログイン', ['class' => 'form-button'])!!}
  </div>

 {!! Form::close() !!}
</div> 
 @include("layouts.footer")
@endsection


