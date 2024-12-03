@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/address.css')  }}" >
@endsection
@section('content')
@if (session('result'))
<div class="flash_message">
  {{ session('result') }}
</div>
@endif
<h2 class="profile__title">住所変更</h2>
<form class="profile-form" action="{{ route('update.address') }}" method="post">
    @csrf
        <input type="hidden" name="item_id" value="{{ $item_id }}">
        <label for="zip_code">郵便番号</label>
        <input type="text" name="zip_code" value="{{ $address->zip_code ?? '' }}" class="profile__input">
        <label for="address">住所</label>
        <input type="text" name="address" value="{{ $address->address ?? '' }}" class="profile__input">
        <label for="building">建物名</label>
        <input type="text" name="building" value="{{ $address->building ?? ''}}" class="profile__input">
        <button type="submit" class="profile__submit">更新する</button>
</form>
@endsection