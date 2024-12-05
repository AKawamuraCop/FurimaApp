<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FurimaApp</title>
    <link rel="stylesheet" href= "{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/common.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @yield('css')
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="logo"><a href="/">COACHTECH</a></div>
            <nav class="nav">
                @if(Auth::check() && Auth::user()->hasVerifiedEmail())
                <form class="search-form" action="/search" method="get">
                    <input type="text" name="search"placeholder="何をお探しですか？" class="search-bar">
                </form>
                <form class="logout-form" action="/logout" method="post">
                    @csrf
                    <button class="logout-button">ログアウト</button>
                </form>
                    <a href="/mypage?tab=sell">マイページ</a>
                    <a href="/sell">出品</a>
                @endif
            </nav>
        </header>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>