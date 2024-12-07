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
        <form class="form" action="/sell" method="post" enctype="multipart/form-data">
            @csrf
            <section class="form-section">
                <h2 class="form-section-title">商品画像</h2>
                <div class="image-upload">
                    <label for="image" class="image-upload-label">画像を選択する</label>
                    <input type="file" id="image" name="image" class="image-input" accept="image/*">
                    <div class="image-preview" id="imagePreview" style="margin-top: 10px;">
                        <img id="previewImage" src="" alt="プレビュー画像" style="max-width: 100%; display: none;">
                    </div>
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
                @error('condition')
                    <p class="error">{{ $message }}</p>
                @enderror
            </section>
            <section class="form-section">
                <h2 class="form-section-title">商品名と説明</h2>
                <label for="name" class="label">商品名</label>
                <input type="text" id="name" name="name" class="input">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
                <label for="description" class="label">商品の説明</label>
                <textarea id="description" name="description" class="textarea"></textarea>
                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
                <label for="price" class="label">販売価格</label>
                <input type="text" id="price" name="price" class="input price-input" placeholder="¥">
                @error('price')
                    <p class="error">{{ $message }}</p>
                @enderror
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

        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0]; // アップロードされたファイルを取得
            const previewImage = document.getElementById('previewImage'); // プレビュー用の画像要素
            if (file) {
                const reader = new FileReader(); // FileReader オブジェクトを作成
                reader.onload = function(e) {
                    previewImage.src = e.target.result; // プレビュー画像の src を設定
                    previewImage.style.display = 'block'; // プレビュー画像を表示
                };
                reader.readAsDataURL(file); // ファイルをデータURLとして読み込む
            } else {
                previewImage.style.display = 'none'; // ファイルが選択されていない場合は非表示
            }
        });
    </script>
@endsection