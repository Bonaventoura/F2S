<?php

use App\Niveau;
use Illuminate\Database\Seeder;

class NiveauTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Niveau::create([
            'niv'=>0,
            'valeur'=>0
        ]);

        Niveau::create([
            'niv'=>1,
            'valeur'=>60000
        ]);

        Niveau::create([
            'niv'=>2,
            'valeur'=>240000
        ]);

        Niveau::create([
            'niv'=>3,
            'valeur'=>780000
        ]);

        Niveau::create([
            'niv'=>4,
            'valeur'=>2400000
        ]);

        Niveau::create([
            'niv'=>5,
            'valeur'=>7260000
        ]);

        Niveau::create([
            'niv'=>6,
            'valeur'=>21840000
        ]);

        Niveau::create([
            'niv'=>7,
            'valeur'=>65580000
        ]);

        Niveau::create([
            'niv'=>8,
            'valeur'=>196800000
        ]);

    }
}
