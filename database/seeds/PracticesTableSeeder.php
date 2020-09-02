<?php

use Illuminate\Database\Seeder;

class PracticesTableSeeder extends Seeder
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
        DB::table('practices')->truncate();

        $practices = [
            [
                'practice_time' => 1,
                'bass_key' => 'C',
                'bass_times' => 1,
                'stretch_key' => 'F',
                'stretch_times' => 1,
                'falsetto_times' => 1,
                'other' => 'この世で１番の奇跡を読んだ。',
                'practice_song' => 'LOVE',
                'practice_artist' => 'Nat King Cole',
                'user_id' => 1,
                'song_id' => 1,
            ]
        ];


        foreach ($practices as $practice) {
            \App\Practice::create($practice);
        }
    }
}
