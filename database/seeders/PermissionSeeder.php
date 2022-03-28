<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
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

            // manage profile
            "edit-profile",
            "change-password",

            // can comment or not
            "comment",

            // change highlight news
            "change-highlight-news"
        ];

        for ($i = 0; $i < count($permissions); $i++) {
            Permission::create([
                "name" => $permissions[$i]
            ]);
        }
    }
}
