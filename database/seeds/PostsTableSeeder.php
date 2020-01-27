<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Schema;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Post::truncate();
        DB::table('category_post')->truncate();
        Schema::enableForeignKeyConstraints();

        $eventCategory = Category::where('name', 'Event')->first();
        $fablabCategory = Category::where('name', 'FabLab')->first();
        $cctlCategory = Category::where('name', 'CCTL')->first();
        $vieCategory = Category::where('name', 'Vie Associative')->first();

        $event = Post::create([
            'title'  => 'event title',
            'content' => 'event content ',
            'user_id' => '1'
        ]);

        $fablab = Post::create([
            'title'  => 'fablab title',
            'content' => 'fablab content',
            'user_id' => '1'
        ]);

        $cctl = Post::create([
            'title'  => 'cctl title',
            'content' => 'cctl content',
            'user_id' => '1'
        ]);

        $vie = Post::create([
            'title'  => 'Vie Associative title',
            'content' => 'Vie Associative content',
            'user_id' => '1'
        ]);

        $event->categories()->associate($eventCategory);
        $fablab->categories()->associate($fablabCategory);
        $cctl->categories()->associate($cctlCategory);
        $vie->categories()->associate($vieCategory);
    }
}
