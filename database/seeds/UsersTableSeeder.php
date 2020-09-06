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

        $users = [
                    ['name' => 'Test',
                    'email' => 'test@test',
                    'password' => 'testTest',
                    'avatar' => '',
                    'introduce' => 'こんにちわ']
                    ];


        foreach($users as $user) {
            \App\User::create($user);
        }
    }
}
