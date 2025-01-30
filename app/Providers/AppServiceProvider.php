<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
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
    
       // Partager le terme de recherche avec toutes les vues
    View::composer('*', function ($view) {
        $search = Request::query('search', ''); // Utilisation de la façade Request
        $view->with('globalSearch', $search);
    });
    }
}
