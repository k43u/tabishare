 <header>
 <link rel="stylesheet" href="{{asset('css/style.css') }}" />
 <a class="navbar-brand" href="/"><h1>旅シェア</h1></a>
 <ul class="navbar-nav">
  <li>{!! link_to_route('signup.post', 'ユーザー登録', [], ['class' => 'nav-link']) !!}</li>
  <li>{!! link_to_route('login.post', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
 <a href="/"><li>お問い合わせ</li></a>
 </ul>
 </header>