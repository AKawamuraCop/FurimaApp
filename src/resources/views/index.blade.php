@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css')  }}" >
@endsection
@section('content')
<div class="tabs">
    <a href="/" class="tab {{ $tab !== 'mylist' ? 'active' : 'not-active' }}">おすすめ</a>
    <a href="/?tab=mylist" class="tab {{ $tab === 'mylist' ? 'active' : 'not-active' }}">マイリスト</a>
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