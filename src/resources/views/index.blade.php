@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css')  }}" >
@endsection
@section('content')
 <div class="tabs">
        <a href="#" class="tab active">おすすめ</a>
        <a href="#" class="tab">マイリスト</a>
</div>
<div class="product-grid">
    @foreach($items as $item)
        <div class="product-card">
            <div class="product-image">{{$item->image}}</div>
            <div class="product-name">{{$item->name}}</div>
        </div>
    @endforeach
</div>
@endsection