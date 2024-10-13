<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Factory;
use Database\Factories\CategoryFactory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
          Gate::define('show-admin-panel', function (){
              return (auth()->user()->is_admin) ? true : '';
          });
//        Category::factory(5)->create();
//        Post::factory(5)->create();
//        Comment::factory(20)->create();
//        User::factory(3)->create();
    }
}
