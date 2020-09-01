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
        DB::table('scales')->truncate();
    }
}
