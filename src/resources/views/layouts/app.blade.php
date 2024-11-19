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
            <div class="logo">COACHTECH</div>
            <input type="text" placeholder="何をお探しですか？" class="search-bar">
            <nav class="nav">
                <a href="#">ログイン</a>
                <a href="#">マイページ</a>
                <a href="#">登録</a>
            </nav>
        </header>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>