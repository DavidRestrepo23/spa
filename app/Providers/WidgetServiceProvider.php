<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Post;
class WidgetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['blog.html.widget', 'blog.html.nav'], function($view){
            $categories = Category::getAllCategories();
            $postMaxView = Post::where('status', 'PUBLISHED')->where('views', '>=', '18')->get();
            $view->with(['categories' => $categories, 'postMaxView' => $postMaxView]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
