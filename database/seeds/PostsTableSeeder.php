<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        DB::table('post_category')->truncate();

        /*$EventCategory = Category::where('name', 'Event')->first();
        $FablabCategory = Category::where('name', 'FabLab')->first();
        $CctlCategory = Category::where('name', 'CCTL')->first();

        $event = Post::create([
            'title'  => 'Event_title',
            'name' => 'quentin'
        ]);

        $fablab = Post::create([
            'title'  => 'FabLab_title',
            'name' => 'quentin'
        ]);

        $cctl = Post::create([
            'title'  => 'CCTL_title',
            'name' => 'quentin'
        ]);

        $event->categories()->attach($EventCategory);
        $fablab->categories()->attach($FablabCategory);
        $cctl->categories()->attach($CctlCategory);*/
    }
}
