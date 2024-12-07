<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => 'テストユーザー①',
            'email' => 'test001@mail.com',
            'password' => Hash::make('testuser001'),
            'email_verified_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テストユーザー②',
            'email' => 'test002@mail.com',
            'password' => Hash::make('testuser002'),
            'email_verified_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);$param = [
            'name' => 'テストユーザー③',
            'email' => 'test003@mail.com',
            'password' => Hash::make('testuser003'),
            'email_verified_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テストユーザー④',
            'email' => 'test004@mail.com',
            'password' => Hash::make('testuser004'),
            'email_verified_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テストユーザー⑤',
            'email' => 'test005@mail.com',
            'password' => Hash::make('testuser005'),
            'email_verified_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
    }
}
