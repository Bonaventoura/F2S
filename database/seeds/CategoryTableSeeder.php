<?php

use App\Models\Client\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>"Electronique"
        ]);

        Category::create([
            'name'=>"Industrielle"
        ]);

        Category::create([
            'name'=>"Technomogie"
        ]);

        Category::create([
            'name'=>"Informatique"
        ]);

        Category::create([
            'name'=>"Vestimentaire"
        ]);

        Category::create([
            'name'=>'Alimentaire'
        ]);
        
    }
}
