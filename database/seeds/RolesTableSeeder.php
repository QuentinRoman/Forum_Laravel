<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'cesi']);
        Role::create(['name' => 'user']);
    }
}
