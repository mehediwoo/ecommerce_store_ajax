<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\footer;
use App\Models\category;
use App\Models\social;

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
        $footer = footer::first();
        $all_category = category::latest()->get();
        $social = social::latest()->first();
        View::share([
            'all_category'=>$all_category,
            'footer'=>$footer,
            'social'=>$social,
        ]);

        Paginator::useBootstrap();
    }
}
