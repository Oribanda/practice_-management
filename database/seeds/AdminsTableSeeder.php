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
                'name' => 'TestAdmin',
                'email' => 'testAdmin@test',
                'password' => 'adminAdmin',
                'avter' => 'null',
            ]
        ];


        foreach ($admins as $admin) {
            \App\Admin::create($admin);
        }
    }
}
