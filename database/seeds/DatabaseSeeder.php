<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(SongsTableSeeder::class);
        $this->call(PracticesTableSeeder::class);
        $this->call(ScalesTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(TemposTableSeeder::class);
        $this->call(GendersTableSeeder::class);
    }
}
