@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/sell.css')  }}" >
@endsection

@section('content')
@if (session('result'))
<div class="flash_message">
    {{ session('result') }}
</div>
@endif
 <h1 class="title">商品の出品</h1>
    <form class="form" action="/sell" method="post">
        @csrf
        <section class="form-section">
            <h2 class="form-section-title">商品画像</h2>
            <div class="image-upload">
                <label for="image-upload" class="image-upload-label">画像を選択する</label>
                <input type="file" id="image-upload" name="image" class="image-input">
            </div>
        </section>

        <section class="form-section">
            <h2 class="form-section-title">商品の詳細</h2>
            <div class="categories">
                @foreach ($categories as $category)
                    <label class="category" data-value="{{ $category->value }}">
                        {{ $category->label() }}
                    </label>
                @endforeach
                <input type="hidden" name="categories" id="selectedCategories" value="">
            </div>
            <label for="condition" class="label">商品の状態</label>
            <select id="condition" name="condition" class="select">
                <option value="">選択してください</option>
                @foreach($conditions as $condition)
                    <option value="{{ $condition->value }}">{{ $condition->label() }}</option>
                @endforeach
            </select>
        </section>

        <section class="form-section">
            <h2 class="form-section-title">商品名と説明</h2>
            <label for="name" class="label">商品名</label>
            <input type="text" id="name" name="name" class="input">
            <label for="description" class="label">商品の説明</label>
            <textarea id="description" name="description" class="textarea"></textarea>
            <label for="price" class="label">販売価格</label>
            <input type="text" id="price" name="price" class="input price-input" placeholder="¥">
        </section>

        <button type="submit" class="submit-button">出品する</button>
    </form>

<script>
   document.addEventListener('DOMContentLoaded', () => {
    const categories = document.querySelectorAll('.category');
    const selectedCategoriesInput = document.getElementById('selectedCategories');

    categories.forEach(category => {
        category.addEventListener('click', () => {
            // Toggle the 'selected' class
            category.classList.toggle('selected');

            // Get all selected categories
            const selectedCategories = Array.from(
                document.querySelectorAll('.category.selected')
            ).map(selected => selected.getAttribute('data-value'));

            // Update the hidden input field with the selected categories
            selectedCategoriesInput.value = selectedCategories; // 配列形式で送信
        });
    });
});
</script>

@endsection