<?php

namespace App\Providers;

use App\Test;
use App\Test1;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('test',function(){
        //     return new Test();
        // });
        // $this->app->bind('test1',function(){
        //             return new Test1();
        //     });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
