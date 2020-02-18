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
        Schema::enableForeignKeyConstraints();

        Post::create([
            'title'  => 'event title',
            'content' => 'event content ',
            'user_id' => '1',
            'category_id' => '1'
        ]);

        Post::create([
            'title'  => 'fablab title',
            'content' => 'fablab content',
            'user_id' => '1',
            'category_id' => '2'
        ]);

        Post::create([
            'title'  => 'cctl title',
            'content' => 'cctl content',
            'user_id' => '1',
            'category_id' => '3'
        ]);

        Post::create([
            'title'  => 'Vie Associative title',
            'content' => 'Vie Associative content',
            'user_id' => '1',
            'category_id' => '4'
        ]);

    }
}
