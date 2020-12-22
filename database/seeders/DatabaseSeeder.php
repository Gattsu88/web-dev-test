<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(10)
            ->has(Post::factory()->count(10), 'posts')
            ->has(News::factory()->count(10), 'news')
            ->create();

        Post::create([
            'user_id' => 3,
            'title' => 'TRY THIS ONE!!!',
            'content' => 'THIS POST HAS MANY APPROVED COMMENTS!!! Vestibulum non felis lacinia, convallis augue eu, venenatis orci. Proin orci diam, luctus a scelerisque at, blandit non lacus. Sed nec feugiat sem. Nam molestie est neque, sed tempor est vehicula vel. Sed a tristique eros, eu pretium ipsum.'
        ]);

        Comment::factory(100)->create();
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 101,
            'status' => 1,          
            'name' => 'Cosmictrip Soulfreak',
            'email' => 'btug@walmartnet.com',
            'text' => 'Nulla sollicitudin euismod purus, sed scelerisque nisl malesuada sed. Duis tempus dictum augue, at malesuada lacus tristique eget. In hendrerit arcu blandit, gravida odio et, ornare augue. Cras aliquam gravida massa, vitae fringilla arcu imperdiet sit amet.'
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 101,
            'parent_id' => 101,
            'status' => 1,            
            'name' => 'Daydropper Meadowspirit',
            'email' => 'tbalazs.gegeny1@walmarte-shop.com',
            'text' => 'Etiam dapibus eros ut pellentesque consectetur. In in lacus ac mi facilisis aliquam. Interdum et malesuada fames ac ante ipsum primis in faucibus.'
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 101,
            'parent_id' => 102,
            'status' => 1,            
            'name' => 'Peacedancer Starbeat',
            'email' => '2gum@cheapwatch.store',
            'text' => 'Etiam quis ligula in ante varius ultricies ut sit amet ipsum. Nam in justo a diam mollis commodo. Curabitur vitae lacus in massa placerat pretium. Phasellus vestibulum hendrerit metus.'
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 101,
            'status' => 1,            
            'name' => 'Rabbitride Sundream',
            'email' => 'psag@greendike.com',
            'text' => 'Sed id euismod elit, mattis dapibus libero. Cras ut vehicula lectus. Phasellus finibus sapien eu metus posuere, ac ultrices dui consectetur. Praesent vel arcu pulvinar, gravida elit eget, mattis tortor.'
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 101,
            'parent_id' => 101,
            'status' => 1,            
            'name' => 'Moonmother Cloudride',
            'email' => 'tgayelx@cronx.com',
            'text' => 'Vestibulum non felis lacinia, convallis augue eu, venenatis orci. Proin orci diam, luctus a scelerisque at, blandit non lacus. Sed nec feugiat sem. Nam molestie est neque, sed tempor est vehicula vel. Sed a tristique eros, eu pretium ipsum.'
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 101,
            'parent_id' => 102,
            'status' => 1,            
            'name' => 'Solarbeat Astraldropper',
            'email' => 'zmehdielou@air.stream',
            'text' => 'Phasellus dui ex, fringilla vitae tellus vitae, pharetra dapibus augue. Pellentesque iaculis et lorem quis gravida. Suspendisse ac ligula non metus rutrum pretium.'       
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 101,
            'status' => 0,            
            'name' => 'Meadowhaze Rhythmsister',
            'email' => 'psag@greendike.com',
            'text' => 'Sed id euismod elit, mattis dapibus libero. Cras ut vehicula lectus. Phasellus finibus sapien eu metus posuere, ac ultrices dui consectetur. Praesent vel arcu pulvinar, gravida elit eget, mattis tortor.'
        ]);
        Comment::create([
            'commentable_type' => Post::class,
            'commentable_id' => 101,
            'status' => 1,            
            'name' => 'Solarbrother Sunsounds',
            'email' => 'psag@greendike.com',
            'text' => 'Sed id euismod elit, mattis dapibus libero. Cras ut vehicula lectus. Phasellus finibus sapien eu metus posuere, ac ultrices dui consectetur. Praesent vel arcu pulvinar, gravida elit eget, mattis tortor.'
        ]);
    }
}
