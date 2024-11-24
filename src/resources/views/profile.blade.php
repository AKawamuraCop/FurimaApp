@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css')  }}" >
@endsection
@section('content')
<h2 class="profile__title">プロフィール設定</h2>
    <div class="profile__image-container">
        <div class="profile__image"></div>
        <button class="profile__image-button">画像を選択する</button>
    </div>
    <form class="profile__form">
        <label for="username">ユーザー名</label>
        <input type="text" id="username" class="profile__input">
        <label for="postcode">郵便番号</label>
        <input type="text" id="postcode" class="profile__input">
        <label for="address">住所</label>
        <input type="text" id="address" class="profile__input">
        <label for="building">建物名</label>
        <input type="text" id="building" class="profile__input">
        <button type="submit" class="profile__submit">更新する</button>
    </form>
@endsection