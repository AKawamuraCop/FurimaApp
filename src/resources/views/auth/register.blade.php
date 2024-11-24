@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/register.css')  }}" >
@endsection
@section('content')
<h1 class="title">会員登録</h1>
    <form class="form" action="/register" method="post">
      @csrf
      <div class="form-group">
        <label for="username">ユーザー名</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="text" name="email" value="{{ old('email') }}">
        @error('email')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="password">パスワード</label>
        <input type="password" name="password">
        @error('password')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="password_confirmation">確認用パスワード</label>
        <input type="password" name="password_confirmation">
        @error('password_confirmation')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="btn">登録する</button>
    </form>
    <a href="/login" class="login-link">ログインはこちら</a>
  </main>
</body>
</html>
@endsection