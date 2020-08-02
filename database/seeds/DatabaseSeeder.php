<?php

use Illuminate\Database\Seeder;
use NiveauTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NiveauTableSeeder::class);
    }
}
