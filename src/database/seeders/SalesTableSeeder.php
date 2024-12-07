<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'item_id' => 1,
            'user_id' => 4
        ];
        DB::table('sales')->insert($param);
        $param = [
            'item_id' => 3,
            'user_id' => 5
        ];
        DB::table('sales')->insert($param);
    }
}
