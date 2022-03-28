<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin'])->givePermissionTo([
            // posts (news) crud
            "posts-access",
            "posts-create",
            "posts-store",
            "posts-edit",
            "posts-show",
            "posts-update",
            "posts-delete",

            // categories crud
            "categories-access",
            "categories-create",
            "categories-store",
            "categories-edit",
            "categories-update",
            "categories-delete",

            // users crud
            "users-access",
            "users-create",
            "users-store",
            "users-edit",
            "users-update",
            "users-delete",

            // change highlight news
            "change-highlight-news"
        ]);

        Role::create(['name' => 'author'])->givePermissionTo([
            // posts (news) crud
            "posts-access",
            "posts-create",
            "posts-store",
            "posts-edit",
            "posts-show",
            "posts-update",
            "posts-delete",
        ]);
        
        Role::create(['name' => 'subscriber']);
    }
}
