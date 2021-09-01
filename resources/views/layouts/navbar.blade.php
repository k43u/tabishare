<header>
 <link rel="stylesheet" href="{{asset('css/style.css') }}" />
 <a class="navbar-brand" href="/"><h1>旅シェア</h1></a>

 <ul>
@if(Auth::check())
  <li>{!! link_to_route('trips.create', '投稿作成ページ', [], ['class' => 'nav-link']) !!}</li>
　<li>{!! link_to_route('trips.yourtrips', 'あなたの旅一覧', [], ['class' => 'nav-link']) !!}</li>
　 <a href="/"><li>お気に入りの旅</li></a>
　 <a href="/"><li>ユーザー管理</li></a>
  <li>{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
   <a href="/"><li>お問い合わせ</li></a>
@else
 <ul class="navbar-nav">
  <li>{!! link_to_route('signup.post', 'ユーザー登録', [], ['class' => 'nav-link']) !!}</li>
  <li>{!! link_to_route('login.post', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
  {{-- 未作成↓ --}}
 <a href="/"><li>お問い合わせ</li></a>
 @endif
 </ul>
</header>
