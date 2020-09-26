<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // テーブルのクリア
        DB::table('users')->truncate();

        // 初期データ用意（列名をキーとする連想配列）
        $users = [
            [
                'name' => 'testUser',
                'email' => 'testUser@testUser.com',
                'password' => 'ssss5555',
                'avatar' => 'noimage.png',
                'introduce' => 'これから練習頑張ります！'
            ]
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
