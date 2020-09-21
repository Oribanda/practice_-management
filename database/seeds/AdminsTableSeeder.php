<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
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
        DB::table('admins')->truncate();

        $admins = [
            [
                'name' => 'testAdmin',
                'email' => 'testAdmin@testAdmin.com',
                'password' => 'aaaa5555',
                'avatar' => 'noimage.png',
            ]
        ];

        foreach ($admins as $admin) {
            \App\Models\Admin::create($admin);
        }
    }
}
