<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
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
        $this->call(UsersTableSeeder::class);
        DB::table('categories')->delete();

        $categories = Category::create([
            'name' => '小小白',
            'slug' => 'xiao-xiao-bai'
        ]);

        $posts=Post::create([
            'name' => '小小白',
            'slug' => 'xiao-xiao-bai'
            ]);
    }
}
