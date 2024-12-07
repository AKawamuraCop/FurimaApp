@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/purchase.css')  }}" >
@endsection
@section('content')
    <section class="product-details">
        <div class="product-image">
            <img src="{{ preg_match('/^http/', $item->image) ? $item->image : asset($item->image) }}" alt="Item Image" class="product-image">
        </div>
        <div class="product-info">
            <h1>{{ $item->name }}</h1>
            <p class="price">{{ $item->price }}</p>
            <h2>支払い方法</h2>
            <select>
                <option>選択してください</option>
            </select>
            <h2>配送先</h2>
            @if(!empty($item->senderAddress) && $item->senderAddress->user_id === Auth::id())
                <p>〒 {{ $item->senderAddress->zip_code }}<br>{{ $item->senderAddress->address }}</p>
            @else
                <p>〒 {{ $profile->zip_code }}<br>{{ $profile->address }}</p>
            @endif
            <a href="{{ route('purchase.address', ['item_id' => $item->id]) }}" class="change-link">変更する</a>
        </div>
        <aside class="order-summary">
            <div class="summary-item">
                <span>商品代金</span>
                <span>¥ {{ $item->price }}</span>
            </div>
            <div class="summary-item">
                <span>支払い方法</span>
                <span>コンビニ払い</span>
            </div>
            <button class="purchase-button">購入する</button>
        </aside>
    </section>
@endsection