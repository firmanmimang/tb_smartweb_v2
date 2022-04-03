<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
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
        ->givePermissionTo(['comment', 'edit-profile', 'change-password', '']);

        
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
        Category::create([
            'name' => 'Otomitif',
            'slug' => 'otomitif'
        ]);
        Category::create([
            'name' => 'Kampus',
            'slug' => 'kampus'
        ]);
        Category::create([
            'name' => 'Coba',
            'slug' => 'coba'
        ]);
        Category::create([
            'name' => 'CobaLagi',
            'slug' => 'coba-lagi'
        ]);
        Category::create([
            'name' => 'CobaCoba',
            'slug' => 'coba-coba'
        ]);
        Category::create([
            'name' => 'CobaCobaCoba',
            'slug' => 'coba-coba-coba'
        ]);
        Category::create([
            'name' => 'CobaTest',
            'slug' => 'coba-test'
        ]);
        Category::create([
            'name' => 'CobaLagiLagi',
            'slug' => 'coba-lagi-lagi'
        ]);
        Category::create([
            'name' => 'OK OK',
            'slug' => 'ok-ok'
        ]);

        News::factory(20)->create();
    }
}
