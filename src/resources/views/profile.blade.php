@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css')  }}" >
@endsection
@section('content')
<h2 class="profile__title">プロフィール設定</h2>
<form class="profile-form" action="/profile" method="post">
    @csrf
    <div class="profile__image-container">
        <div class="profile__image"></div>
        <button class="profile__image-button">画像を選択する</button>
    </div>
        <label for="username">ユーザー名</label>
        <input type="text" name="user_name" value="{{ Auth::user()->name }}" class="profile__input">
        <label for="zip_code">郵便番号</label>
        <input type="text" name="zip_code" value="{{ $profile->zip_code ?? '' }}" class="profile__input">
        <label for="address">住所</label>
        <input type="text" name="address" value="{{ $profile->address ?? '' }}" class="profile__input">
        <label for="building">建物名</label>
        <input type="text" name="building" value="{{ $profile->building ?? ''}}" class="profile__input">
        <button type="submit" class="profile__submit">更新する</button>
</form>
@endsection