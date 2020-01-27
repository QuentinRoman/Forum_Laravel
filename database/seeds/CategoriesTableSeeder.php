<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
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

        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        Category::create(['name' => 'Event']);
        Category::create(['name' => 'FabLab']);
        Category::create(['name' => 'CCTL']);
        Category::create(['name' => 'Vie Associative']);
    }
}
