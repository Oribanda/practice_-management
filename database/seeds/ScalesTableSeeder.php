<?php

use Illuminate\Database\Seeder;

class ScalesTableSeeder extends Seeder
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
        DB::table('scales')->truncate();

        $scales = [
            [
                'E_under' => '1',
                'F' => '2',
                'F#' => '3',
                'G' => '4',
                'G#' => '5',
                'A' => '6',
                'A#' => '7',
                'B' => '8',
                'hi_C' => '9',
                'hi_C#' => '10',
                'hi_D' => '11',
                'hi_D#' => '12',
                'hi_E' => '13',
                'hi_F_over' => '14',
                'song_id' => 1,
            ]
        ];


        foreach ($scales as $scale) {
            \App\Scale::create($scale);
        }
    }
}
