<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        // $this->call(UsersTableSeeder::class);
        $this->call('PostsSeeder');

    }
}

/**
 *
 */
class PostsSeeder extends Seeder
{

  public function run()
  {
    DB::table('posts')->delete();
    Post::create([
      'title' => 'First Post',
      'slug' => 'first-post',
      'excerpt' => '<b>First Post body</b>',
      'content' => '<b>Content First Post Body</b>',
      'published' => false,
      'published_at' => DB:rav('CURRENT_TIMESTAMP')
    ]);

    // Post::create([
    //   'title' => 'Second Post',
    //   'slug' => 'Second-post',
    //   'excerpt' => '<b>Second Post body</b>',
    //   'content' => '<b>Content Second Post Body</b>',
    //   'published' => false,
    //   'published_at' => DB:rav('CURRENT_TIMESTAMP')
    // ]);
    //
    //
    // Post::create([
    //   'title' => 'Third  Post',
    //   'slug' => 'third-post',
    //   'excerpt' => '<b>Third Post body</b>',
    //   'content' => '<b>Content Third Post Body</b>',
    //   'published' => false,
    //   'published_at' => DB:rav('CURRENT_TIMESTAMP')
    // ]);
  }
}
