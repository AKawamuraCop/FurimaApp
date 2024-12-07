@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('/css/login.css')  }}" >
@endsection
@section('content')
  @if (session('error'))
    <div class="flash_message">
      {{ session('error') }}
    </div>
  @endif
  <h1 class="title">ログイン</h1>
    <form class="form" action="/login" method="post">
      @csrf
      <div class="form-group">
        <label for="email">ユーザー名/メールアドレス</label>
        <input  name="email" name="email" type="email" >
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
      <button type="submit" class="btn">ログインする</button>
    </form>
    <a href="/register" class="register-link">新規登録はこちら</a>
@endsection