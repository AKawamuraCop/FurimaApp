@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/detail.css')  }}" >
@endsection
@section('content')
    
    <div class="product-details">
        <div class="product-image">
           <img src="{{ preg_match('/^http/', $item->image) ? $item->image : asset($restaurant->image) }}" alt="Item Image" class="product-image">
        </div>
        
        <div class="product-info">
            <h1 class="product-title">{{$item->name}}</h1>
            <p class="product-brand">{{$item->brand}}</p>
            <p class="product-price">{{$item->price}}(税込)</p>
            @if(Auth::check())
                @if(count($item->favorites) == 0)
                    <form class="ml-a" method="POST" action="{{ route ('like',['item_id' => $item->id]) }}">
                        @csrf
                        <input class="shop-card__content__icon inactive" type="image" src="/img/unlike.png" alt="いいねをする" width="32px" height="32px">
                    </form>
                @else
                    <form class="ml-a" method="POST" action="{{ route ('unlike',['item_id' => $item->id]) }}">
                        @csrf
                        <input class="shop-card__content__icon inactive" type="image" src="/img/like.png" alt="いいねを外す" width="32px" height="32px">
                    </form>
                @endif
            @endif
            <button class="purchase-button">購入手続きをへ</button>
            
            <h2>商品説明</h2>
            <p class="product-description">
                {{$item->description}}
            </p>
            
            <h2>商品の情報</h2>
            <p>カテゴリー：
                @foreach($categories as $category)
                <span class="category">{{$category->number->label()}}</span>
                @endforeach
            </p>
            <p>商品の状態：</p>
            
            <h2>コメント (1)</h2>
            <div class="comment">
                <div class="comment-avatar">●</div>
                <div class="comment-content">
                    <span class="comment-author">admin</span>
                    <input type="text" placeholder="コメントを入力してください">
                </div>
            </div>
            
            <h2>商品のコメント</h2>
            <textarea placeholder="コメントを投稿する"></textarea>
            <button class="comment-submit-button">コメントを投稿する</button>
        </div>
    </div>
@endsection

