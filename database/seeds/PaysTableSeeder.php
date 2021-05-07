<?php

use App\Models\Pays;
use Illuminate\Database\Seeder;

class PaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pays::create([
            'nom'=>'Afrique du Sud',
            'prefix'=>'228'
        ]);
    }
}
