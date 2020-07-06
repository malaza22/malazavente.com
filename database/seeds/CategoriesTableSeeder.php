<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Homme',
            'slug' => 'Homme'
        ]);
        Category::create([
            'name' => 'Femme',
            'slug' => 'Femme'
        ]);
        Category::create([
            'name' => 'Enfant',
            'slug' => 'Enfant'
        ]);
    }
}
