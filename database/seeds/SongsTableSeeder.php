<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
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
        DB::table('songs')->truncate();

        $songs = [
            [
                'song_name' => 'LOVE',
                'artist_name' => 'Nat King Cole',
                'scale_id' => 1,
                'genre_id' => 1,
                'tempo_id' => 1,
                'gender_id' => 1,
            ]
        ];


        foreach ($songs as $song) {
            \App\Song::create($song);
        }
    }
}
