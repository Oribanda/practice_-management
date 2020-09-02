<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
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
        DB::table('genders')->truncate();

        $genders = [
            [
                'man' => '1',
                'woman' => '2',
                'song_id' => '1',
            ]
        ];


        foreach ($genders as $gender) {
            \App\Gender::create($gender);
        }
    }
}
