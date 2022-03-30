<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $category = Category::get(['name', 'slug']);
        View::share('categoriesGlobal', $category);
        View::share('categoriesFooter', array_chunk($category->toArray(), 2));

        // permission comment
        Gate::define('comment', function(User $user){
            return $user->hasPermissionTo('comment');
        });

        // permisson posts (news) crud
        Gate::define('posts-access', function(User $user){
            return $user->hasPermissionTo('posts-access');
        });
        Gate::define('posts-create', function(User $user){
            return $user->hasPermissionTo('posts-create');
        });
        Gate::define('posts-store', function(User $user){
            return $user->hasPermissionTo('posts-store');
        });
        Gate::define('posts-show', function(User $user){
            return $user->hasPermissionTo('posts-show');
        });
        Gate::define('posts-edit', function(User $user){
            return $user->hasPermissionTo('posts-edit');
        });
        Gate::define('posts-update', function(User $user){
            return $user->hasPermissionTo('posts-update');
        });
        Gate::define('posts-delete', function(User $user){
            return $user->hasPermissionTo('posts-delete');
        });
        // ---------------------------------------------------------------
        // permission change highlight news
        Gate::define('change-highlight-news', function(User $user){
            return $user->hasPermissionTo('change-highlight-news');
        });
        // ----------------------------------------------------------------

        // permisson users crud
        Gate::define('categories-access', function(User $user){
            return $user->hasPermissionTo('categories-access');
        });
        Gate::define('categories-create', function(User $user){
            return $user->hasPermissionTo('categories-create');
        });
        Gate::define('categories-store', function(User $user){
            return $user->hasPermissionTo('categories-store');
        });
        Gate::define('categories-edit', function(User $user){
            return $user->hasPermissionTo('categories-edit');
        });
        Gate::define('categories-update', function(User $user){
            return $user->hasPermissionTo('categories-update');
        });
        Gate::define('categories-delete', function(User $user){
            return $user->hasPermissionTo('categories-delete');
        });
        // ---------------------------------------------------------------

        // permisson users crud
        Gate::define('users-access', function(User $user){
            return $user->hasPermissionTo('users-access');
        });
        Gate::define('users-create', function(User $user){
            return $user->hasPermissionTo('users-create');
        });
        Gate::define('users-store', function(User $user){
            return $user->hasPermissionTo('users-store');
        });
        Gate::define('users-edit', function(User $user){
            return $user->hasPermissionTo('users-edit');
        });
        Gate::define('users-update', function(User $user){
            return $user->hasPermissionTo('users-update');
        });
        Gate::define('users-delete', function(User $user){
            return $user->hasPermissionTo('users-delete');
        });
        // ---------------------------------------------------------------
    }
}
