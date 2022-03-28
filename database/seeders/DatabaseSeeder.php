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
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);

        User::create([
            'name'=> 'Firman Hidayat',
            'username'=> 'mimang',
            'email'=> 'fhidayat131@gmail.com',
            'password'=> bcrypt('12345'),
        ])
        ->assignRole('admin')
        ->givePermissionTo(['comment', 'edit-profile', 'change-password']);

        
        User::create([
            'name'=> 'Bentaeee',
            'username'=> 'bentaeee',
            'email'=> 'bentaeee@gmail.com',
            'password'=> bcrypt('12345'),
        ])
        ->assignRole('author')
        ->givePermissionTo(['comment', 'edit-profile', 'change-password']);

        User::create([
            'name'=> 'Bilhuda',
            'username'=> 'bilhuda',
            'email'=> 'bilhuda@gmail.com',
            'password'=> bcrypt('12345'),
        ])
        ->assignRole('subscriber')
        ->givePermissionTo(['comment', 'edit-profile', 'change-password']);

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
    }
}
