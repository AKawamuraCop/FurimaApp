@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css')  }}" >
@endsection
@section('content')
<section class="product-details">
             <div class="product-image">
           <img src="{{ preg_match('/^http/', $item->image) ? $item->image : asset($item->image) }}" alt="Item Image" class="product-image">
        </div>
            <div class="product-info">
                <h1>{{ $item->name }}</h1>
                <p class="price">{{ $item->price }}</p>
                <hr>
                <h2>支払い方法</h2>
                <select>
                    <option>選択してください</option>
                </select>
                <h2>配送先</h2>
                <p>〒 {{ $item->zip_code }}<br>{{ $item->address }}</p>
                <a href="#" class="change-link">変更する</a>
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