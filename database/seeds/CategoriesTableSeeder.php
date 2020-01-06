<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create(['name' => 'Event']);
        Category::create(['name' => 'FabLab']);
        Category::create(['name' => 'CCTL']);
    }
}
