<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'item_id' => 1,
            'number' => 1
        ];
        DB::table('categories')->insert($param);
        $param = [
            'item_id' => 1,
            'number' => 5
        ];
        DB::table('categories')->insert($param);
        $param = [
            'item_id' => 2,
            'number' => 2
        ];
        DB::table('categories')->insert($param);
        $param = [
            'item_id' => 4,
            'number' => 1
        ];
        DB::table('categories')->insert($param);
        $param = [
            'item_id' => 4,
            'number' => 5
        ];
        DB::table('categories')->insert($param);
        $param = [
            'item_id' => 5,
            'number' => 2
        ];
        DB::table('categories')->insert($param);
    }
}
