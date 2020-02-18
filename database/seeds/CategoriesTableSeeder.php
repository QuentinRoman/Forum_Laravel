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

        Category::create(['name' => 'Event', 'slug' => 'event']);
        Category::create(['name' => 'FabLab', 'slug' => 'fablab']);
        Category::create(['name' => 'CCTL', 'slug' => 'cctl']);
        Category::create(['name' => 'Vie Associative', 'slug' => 'vie-associative']);
    }
}
