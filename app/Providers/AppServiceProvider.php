<?php

namespace App\Providers;


use App\Models\Category;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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

        if (Schema::hasTable('categories')){
            View::share('categories', Category::orderBy('title')->get());
        }

       Fortify::loginView(function(){
        return view('auth.login');
       });

       Fortify::registerView(function(){
        return view('auth.register');
       });


    }
}
