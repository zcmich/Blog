<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = User::factory()->create([
           'name' => 'John Doe'
        ]);

        Post::factory(5)->create([
           'user_id' => $user->id
        ]);


//         User::truncate();
//         Post::truncate();
//         Category::truncate();
//
//         $user = User::factory()->create();

//         $personal = Category::create([
//             'name' => 'Personal',
//             'slug' => 'personal'
//         ]);
//
//         $family= Category::create([
//             'name' => 'Family',
//             'slug' => 'Family'
//         ]);
//
//         $work = Category::create([
//             'name' => 'Work',
//             'slug' => 'work'
//         ]);
//
//
//         Post::create([
//             'user_id' => $user->id,
//             'category_id' => $family ->id,
//             'title' => 'My Family Post',
//             'excerpt' => '<p>Lorem ipsum dolor sit amet </p>',
//             'slug' => "my-family-post",
//             'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem in suscipit nulla totam deleniti iusto magni numquam esse quo, similique, perferendis quos enim fugit ipsam et quidem! Aliquam ea eligendi animi et nesciunt cum perspiciatis, dicta repudiandae placeat eius, possimus maiores sed alias quisquam inventore esse voluptati. Exercitationem, at dicta incidunt qui dolores vero dolore, itaque, culpa quam quasi porro omnis. Quae hic cumque fuga labore voluptate eos quod, doloremque veritatis vero.  Nemo qui optio eveniet necessitatibus tempora, cum libero recusandae minima veritatis molestiae ullam unde earum asperiores possimus nulla magnam beatae omnis autem culpa?</p>',
//         ]);
//
//         Post::create([
//             'user_id' => $user->id,
//             'category_id' => $work ->id,
//             'title' => 'My Work Post',
//             'excerpt' => '<p>Lorem ipsum dolor sit amet</p> ',
//             'slug' => "my-work-post",
//             'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem in suscipit nulla totam deleniti iusto magni numquam esse quo, similique, perferendis quos enim fugit ipsam et quidem! Aliquam ea eligendi animi et nesciunt cum perspiciatis, dicta repudiandae placeat eius, possimus maiores sed alias quisquam inventore esse voluptati. Exercitationem, at dicta incidunt qui dolores vero dolore, itaque, culpa quam quasi porro omnis. Quae hic cumque fuga labore voluptate eos quod, doloremque veritatis vero.  Nemo qui optio eveniet necessitatibus tempora, cum libero recusandae minima veritatis molestiae ullam unde earum asperiores possimus nulla magnam beatae omnis autem culpa?</p>',
//
//
//         ]);

    }
}
