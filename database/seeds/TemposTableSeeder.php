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
        DB::table('tempos')->truncate();
    }
}
