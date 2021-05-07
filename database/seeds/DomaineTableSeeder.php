<?php

use App\Models\Domaine;
use Illuminate\Database\Seeder;

class DomaineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domaine::create([
            'nom'=>'Alimentaire'
        ]);

        Domaine::create(['nom'=>'Industrie(PMI)']);
        Domaine::create(['nom'=>'Exportateur de produits de rente']);
        Domaine::create(['nom'=>'Commerce de gros import-export']);
        Domaine::create(['nom'=>'Commerce détails']);
        Domaine::create(['nom'=>'E-commerce']);
        Domaine::create(['nom'=>'Artisanat']);
        Domaine::create(['nom'=>'Technologies']);
        Domaine::create(['nom'=>'Cabinet informatique']);
        Domaine::create(['nom'=>'Autres']);


    }
}
