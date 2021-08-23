<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <header>
<a href="/"><h1>旅シェア</h1></a>
	</header>
	<link rel="stylesheet" href="{{  asset('css/style.css') }}" />
  </head>
  
  <body>
    <p class="lead-form">ユーザー登録</p>

<form>
  <link rel="stylesheet" href="{{  asset('css/register.css') }}" />
  
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
    <input class="inputs" type="email" name="email">
  </div>
  
  <div class="item">
    <label class="label">パスワード<br>(確認用)</label>
    <input class="inputs" type="email" name="email">
  </div>

  <div class="btn-area">
    {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
  </div>

</form>
 {!! Form::close() !!}
  </body>
  
  @include("parts.footer")
  
</html>



















   
   



