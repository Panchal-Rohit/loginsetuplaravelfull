<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Image;
use App\Models\Video;
use App\Models\Result;
use App\Models\NewsEvent;



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
        Schema::defaultStringLength(191); 
        Paginator::useBootstrap();
    } 

    


}
    