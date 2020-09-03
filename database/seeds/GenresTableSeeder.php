<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
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
        DB::table('genres')->truncate();

        $genres = [
            [
                'jaz' => '1',
                'rock' => '2',
                'musical' => '3',
                'R&B' => '4',
                'pop' => '5',
                'soul' => '6',
                'funk' => '7',
                'song_id' => 1,
            ]
        ];


        foreach ($genres as $genre) {
            \App\Genre::create($genre);
        }
    }
}
