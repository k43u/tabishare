@extends('layouts.app')

@section('content')
  <p class="lead-form">プロフィール</p>

  <link rel="stylesheet" href="{{  asset('css/style.css') }}" />
  
  {!! Form::open(['route' => ['users.update', $user->id ], 'method' => 'put']) !!}
    <div class="item">
      <label class="label">ユーザー名<br>（ニックネーム）</label>
      <input class="inputs" type="text" name="name" value={{$user->name}}>
    </div>
    
    <div class="item">
      <label class="label">メールアドレス</label>
      <input class="inputs" type="email" name="email" value={{$user->email}}>
    </div>
    
    <div class="item">
      <label class="label">新しいパスワード<br>(アルファベット8文字以上)</label>
      <input class="inputs" type="password" name="password">
    </div>
    
    <div class="item">
      <label class="label">新しいパスワード<br>(確認用)</label>
      <input class="inputs" type="password" name="password_confirmation">
    </div>
  
    <div class="btn-area">
      {!! Form::submit('更新', ['class' => 'form-button']) !!}
    </div>
  {!! Form::close() !!}
  
  @include("layouts.footer")
@endsection
  
</html>
