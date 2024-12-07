@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/mypage.css')  }}" >
@endsection
@section('content')
    <div class="profile__image">
        <img src="{{ preg_match('/^http/', $profile->image) ? $profile->image : asset($profile->image) }}" alt="profileImage" class="profile-image" >
    </div>
    <h1 class="profile__name">{{ Auth::user()->name }}</h1>
    <a href="/profile" class="profile__edit-button">プロフィールを編集</a>
    <div class="tabs">
        <a href="/mypage?tab=sell" class="tab {{ $tab === 'sell' ? 'active' : 'not-active' }}">出品した商品</a>
        <a href="/mypage?tab=buy" class="tab {{ $tab === 'buy' ? 'active' : 'not-active' }}">購入した商品</a>
    </div>
    @if (session('result'))
        <div class="flash_message">
            {{ session('result') }}
        </div>
    @endif
    <div class="product-grid">
        @foreach($items as $item)
            <div class="product-card">
                <a href="/item/{{$item->id}}">
                    <img src="{{ preg_match('/^http/', $item->image) ? $item->image : asset($item->image) }}" alt="Item Image" class="product-image">
                </a>
                <div class="product-name">{{$item->name}}</div>
            </div>
        @endforeach
    </div>
@endsection