<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'user_id' => 1,
            'name' => '腕時計',
            'price' => 15000,
            'condition' => 1,
            'description' =>'スタイリッシュなデザインのメンズ腕時計',
            'image' =>'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Armani+Mens+Clock.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 2,
            'name' => 'HDD',
            'price' => 5000,
            'condition' => 2,
            'description' =>'高速で信頼性の高いハードディスク',
            'image' =>'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD+Hard+Disk.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 3,
            'name' => '玉ねぎ3束',
            'price' => 300,
            'condition' => 3,
            'description' =>'新鮮な玉ねぎ3束のセット',
            'image' =>'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/iLoveIMG+d.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 1,
            'name' => '革靴',
            'price' => 4000,
            'condition' => 4,
            'description' =>'クラシックなデザインの革靴',
            'image' =>'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes+Product+Photo.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 2,
            'name' => 'ノートPC',
            'price' => 45000,
            'condition' => 1,
            'description' =>'高性能なノートパソコン',
            'image' =>'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 3,
            'name' => 'マイク',
            'price' => 8000,
            'condition' => 2,
            'description' =>'高音質のレコーディング用マイク',
            'image' =>'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic+4632231.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 1,
            'name' => 'ショルダーバッグ',
            'price' => 3500,
            'condition' => 3,
            'description' =>'おしゃれなショルダーバッグ',
            'image' =>'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 2,
            'name' => 'コーヒーミル',
            'price' => 4000,
            'condition' => 1,
            'description' =>'手動のコーヒーミル',
            'image' =>'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg'
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => 2,
            'name' => 'メイクセット',
            'price' => 2500,
            'condition' => 2,
            'description' =>'便利なメイクアップセット',
            'image' =>'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg'
        ];
        DB::table('items')->insert($param);

    }
}
