<?php

use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
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
        DB::table('classes')->truncate();

        $classes = [
            [
                'name' => 'TestClass',
                'member' => 1,
                'avatar' => '',
                'user_id' => 1,
                'admin_id' => 1,
            ]
        ];


        foreach ($classes as $class) {
            \App\Classes::create($class);
        }
    }
}
