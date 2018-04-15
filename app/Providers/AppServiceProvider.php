<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //防止污染后台
        if(!empty($_SERVER['REQUEST_URI']) && substr($_SERVER['REQUEST_URI'], 0, 5) != '/zcjy'){
            View::composer(
                '*', 'App\Http\ViewComposers\BaseComposer'
            );
        }

         $this->app->singleton('cat', 'App\Repositories\CategoryRepository');
         $this->app->singleton('user', 'App\Repositories\UserRepository');
    }
}
