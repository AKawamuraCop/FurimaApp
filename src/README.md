# アプリケーション名
### coachtechフリマ
ある企業が開発した独自のフリマアプリ

## 概要説明
アイテムの出品と購入を行うためのフリマアプリ

## 他のリポジトリ
なし


## 使用技術(実行環境)
-   PHP 8.1
-   Laravel 10.48.17
-   MySQL 8.0.26

## ER 図
![alt text](image.png)

## 環境構築
### Docker ビルド
1. git clone git@github.com:AKawamuraCop/FurimaApp.git
2. DockerDesktop アプリを立ち上げる
3. docker-compose up -d —build

### Laravel 環境構築
1. docker-compose exec php bash
2. composer install
3. 「.env.example」ファイルを「.env」ファイルに命名を変更。または、新しく.env ファイルを作成。
4. .env に以下の環境変数を追加

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

```
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=your_email@example.com
MAIL_FROM_NAME="Your Name or Your App Name"
```


5. アプリケーションキーの作成
```
php artisan key:generate
```

6. マイグレーションの実行
```
php artisan migrate
```

7. シーディングの実行
```
php artisan db:seed
```


## URL
・開発環境：http://localhost/  
・phpMyAdmin : http://localhost:8080/

