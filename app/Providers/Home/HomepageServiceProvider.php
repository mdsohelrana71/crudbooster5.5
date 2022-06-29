<?php

namespace App\Providers\Home;

use Illuminate\Support\ServiceProvider;

class HomepageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.section.*', \App\Http\ViewComposers\HomepageComposer::class);
    }
}
