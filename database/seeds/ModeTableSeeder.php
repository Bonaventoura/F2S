<?php

use App\Models\Mode;
use Illuminate\Database\Seeder;

class ModeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mode::create(['nom_mode'=>'WERST UNION']);
        Mode::create(['nom_mode'=>'MONEY GRAM']);
        
    }
}
