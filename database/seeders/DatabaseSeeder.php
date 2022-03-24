<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
        ]);

        $user = User::create([
            'name'=> 'Firman Hidayat',
            'username'=> 'mimang',
            'email'=> 'fhidayat131@gmail.com',
            'password'=> bcrypt('12345'),
        ]);

        
        $user2 = User::create([
            'name'=> 'Bentaeee',
            'username'=> 'bentaeee',
            'email'=> 'bentaeee@gmail.com',
            'password'=> bcrypt('12345'),
        ]);

        $user3 = User::create([
            'name'=> 'Bilhuda',
            'username'=> 'bilhuda',
            'email'=> 'bilhuda@gmail.com',
            'password'=> bcrypt('12345'),
        ]);
        
        $user->assignRole('admin');
        $user2->assignRole('author');
        $user3->assignRole('subscriber');

        // User::factory(3)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug'=> 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam quas. Incidunt nam iusto dolorum corporis ducimus aperiam officia,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam quas. Incidunt nam iusto dolorum corporis ducimus aperiam officia, ad cupiditate omnis ipsam quas accusamus dolore dolorem tempore minima eius beatae libero. Eaque pariatur minus corrupti, dolores blanditiis vel voluptatibus harum in magni ipsam repellat magnam quo numquam, earum, laudantium quas vitae officiis. Aliquam, incidunt numquam sint id, possimus fuga facilis doloremque vitae aperiam et modi quisquam laudantium accusantium, optio reprehenderit corrupti ducimus error nemo. Distinctio dicta deleniti fuga sapiente et, quaerat ex ad libero perspiciatis laudantium iusto placeat assumenda voluptatibus quas pariatur voluptates vel. Sunt odio quasi illo officia.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug'=> 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam quas. Incidunt nam iusto dolorum corporis ducimus aperiam officia,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam quas. Incidunt nam iusto dolorum corporis ducimus aperiam officia, ad cupiditate omnis ipsam quas accusamus dolore dolorem tempore minima eius beatae libero. Eaque pariatur minus corrupti, dolores blanditiis vel voluptatibus harum in magni ipsam repellat magnam quo numquam, earum, laudantium quas vitae officiis. Aliquam, incidunt numquam sint id, possimus fuga facilis doloremque vitae aperiam et modi quisquam laudantium accusantium, optio reprehenderit corrupti ducimus error nemo. Distinctio dicta deleniti fuga sapiente et, quaerat ex ad libero perspiciatis laudantium iusto placeat assumenda voluptatibus quas pariatur voluptates vel. Sunt odio quasi illo officia.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug'=> 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam quas. Incidunt nam iusto dolorum corporis ducimus aperiam officia,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam quas. Incidunt nam iusto dolorum corporis ducimus aperiam officia, ad cupiditate omnis ipsam quas accusamus dolore dolorem tempore minima eius beatae libero. Eaque pariatur minus corrupti, dolores blanditiis vel voluptatibus harum in magni ipsam repellat magnam quo numquam, earum, laudantium quas vitae officiis. Aliquam, incidunt numquam sint id, possimus fuga facilis doloremque vitae aperiam et modi quisquam laudantium accusantium, optio reprehenderit corrupti ducimus error nemo. Distinctio dicta deleniti fuga sapiente et, quaerat ex ad libero perspiciatis laudantium iusto placeat assumenda voluptatibus quas pariatur voluptates vel. Sunt odio quasi illo officia.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug'=> 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam quas. Incidunt nam iusto dolorum corporis ducimus aperiam officia,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam quas. Incidunt nam iusto dolorum corporis ducimus aperiam officia, ad cupiditate omnis ipsam quas accusamus dolore dolorem tempore minima eius beatae libero. Eaque pariatur minus corrupti, dolores blanditiis vel voluptatibus harum in magni ipsam repellat magnam quo numquam, earum, laudantium quas vitae officiis. Aliquam, incidunt numquam sint id, possimus fuga facilis doloremque vitae aperiam et modi quisquam laudantium accusantium, optio reprehenderit corrupti ducimus error nemo. Distinctio dicta deleniti fuga sapiente et, quaerat ex ad libero perspiciatis laudantium iusto placeat assumenda voluptatibus quas pariatur voluptates vel. Sunt odio quasi illo officia.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
