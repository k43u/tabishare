@extends('layouts.app')

@section('content')
  <p class="lead-form">ユーザー登録</p>

  <link rel="stylesheet" href="{{asset('css/style.css') }}" />
  
  {!! Form::open(['route' => 'signup.post']) !!}
  
    <div class="item">
      <label class="label">ユーザー名<br>（ニックネーム）</label>
      <input class="inputs" type="text" name="name">
    </div>
    
    <div class="item">
      <label class="label">メールアドレス</label>
      <input class="inputs" type="email" name="email">
    </div>
    
    <div class="item">
      <label class="label">パスワード<br>(アルファベット8文字以上)</label>
      <input class="inputs" type="password" name="password">
    </div>
    
    <div class="item">
      <label class="label">パスワード<br>(確認用)</label>
      <input class="inputs" type="password" name="password_confirmation">
    </div>
  
    <div class="btn-area">
      {!! Form::submit('登録', ['class' => 'form-button']) !!}
    </div>
  </div>
  {!! Form::close() !!}
  
  @include("layouts.footer")
@endsection
  
</html>



















   
   



