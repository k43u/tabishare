<!DOCTYPE html>
<html>

@include("layouts.navbar")

  <body>
    <p class="lead-form">ログイン</p>

<form>
  <link rel="stylesheet" href="{{  asset('css/register.css') }}" />
  
   {!! Form::open(['route' => 'login.post']) !!}
   
  <div class="item">
    <label class="label">メールアドレス</label>
    <input class="inputs" type="email" name="email">
  </div>
  
  <div class="item">
    <label class="label">パスワード<br>(アルファベット8文字以上)</label>
    <input class="inputs" type="email" name="email">
  </div>
  
  <div class="item">
    <label class="label">パスワード<br>(確認用)</label>
    <input class="inputs" type="email" name="email">
  </div>

  <div class="btn-area">
    {!! Form::submit('ログイン') !!}
  </div>

</form>
 {!! Form::close() !!}
 
  </body>
  
  @include("layouts.footer")
  
</html>

