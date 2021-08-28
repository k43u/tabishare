<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>旅シェア</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>

    <body>
        @include('layouts.navbar')

        <div class="container">
            {{-- エラーメッセージ --}}
            @include('layouts.error_messages')

            @yield('content')
        </div>

    </body>
</html>