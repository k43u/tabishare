<header>
 <link rel="stylesheet" href="{{asset('css/style.css') }}"/>
 
 @if(Auth::check())
 <a href="/"><h1>旅シェア</h1></a>
 @else
 <a href="/"><h1>旅シェア</h1></a>
 @endif

 <ul>
@if(Auth::check())
<div class="navigation">
 <ul>
  <li>{!! link_to_route('trips.create', '投稿作成ページ', [], ['class' => 'btn-border-bottom']) !!}</li>
　<li>{!! link_to_route('trips.yourtrips', 'あなたの旅一覧', [], ['class' => 'btn-border-bottom']) !!}</li>
　<li>{!! link_to_route('trips.favorites', 'お気に入りの旅', [], ['class' => 'btn-border-bottom']) !!}</li>
　<li>{!! link_to_route('users.edit', 'プロフィール', [], ['class' => 'btn-border-bottom']) !!}</li>
  <li>{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'btn-border-bottom']) !!}</li>
 </ul>
@else
<div class="navigation">
 <ul>
    <li>{!! link_to_route('signup.post', 'ユーザー登録', [], ['class' => 'btn-border-bottom']) !!}</li> 
    <li>{!! link_to_route('login.post', 'ログイン', [], ['class' => 'btn-border-bottom']) !!}</li>
 </ul>
</div>
 @endif
</header>
