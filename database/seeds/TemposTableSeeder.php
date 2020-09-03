<?php

use Illuminate\Database\Seeder;

class TemposTableSeeder extends Seeder
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
        DB::table('tempos')->truncate();

        $tempos = [
            [
                'ballade' => '1',
                'middle' => '2',
                'up-tempo' => '3',
                'song_id' => '1',
            ]
        ];


        foreach ($tempos as $tempo) {
            \App\Tempo::create($tempo);
        }
    }
}
