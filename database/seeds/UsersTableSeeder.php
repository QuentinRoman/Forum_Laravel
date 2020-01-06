<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\Role;
use App\Post;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        DB::table('role_user')->truncate();
        Schema::enableForeignKeyConstraints();

        $adminRole = Role::where('name', 'admin')->first();
        $cesiRole = Role::where('name', 'cesi')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name'  => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin1234')
        ]);

        $cesi = User::create([
            'name'  => 'Cesi User',
            'email' => 'cesi@cesi.com',
            'password' => Hash::make('cesi1234')
        ]);

        $user = User::create([
            'name'  => 'Classic User',
            'email' => 'user@user.com',
            'password' => Hash::make('user1234')
        ]);

        $admin->roles()->attach($adminRole);
        $cesi->roles()->attach($cesiRole);
        $user->roles()->attach($userRole);
    }
}
