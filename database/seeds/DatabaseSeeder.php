<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// $this->call(UsersTableSeeder::class);

		Post::truncate();
		factory(Post::class, 100)->create();
		Comment::truncate();
		factory(Comment::class, 500)->create();
    }
}
