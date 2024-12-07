@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/profile.css')  }}" >
@endsection
@section('content')
    <h2 class="profile__title">プロフィール設定</h2>
    <form class="profile-form" action="/profile" method="post" enctype="multipart/form-data">
        @csrf
        <div class="profile__image-container">
            <div class="profile__image">
                <div class="image-preview" id="imagePreview" >
                    <img id="previewImage" src="" alt="プレビュー画像" style="max-width: 100%; border-radius: 50%; display: none;">
                </div>
            </div>
            <label for="image" class="profile__image-button">画像を選択する</label>
            <input type="file" id="image" name="image" class="image-input" accept="image/*">
        </div>
        <label for="username">ユーザー名</label>
        <input type="text" name="user_name" value="{{ Auth::user()->name }}" class="profile__input">
        <label for="zip_code">郵便番号</label>
        <input type="text" name="zip_code" value="{{ $profile->zip_code ?? '' }}" class="profile__input">
        <label for="address">住所</label>
        <input type="text" name="address" value="{{ $profile->address ?? '' }}" class="profile__input">
        <label for="building">建物名</label>
        <input type="text" name="building" value="{{ $profile->building ?? ''}}" class="profile__input">
        <button type="submit" class="profile__submit">更新する</button>
    </form>

    <script>
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