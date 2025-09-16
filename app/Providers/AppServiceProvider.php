<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use Illuminate\Support\Facades\View;

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
    public function boot()
    {
    View::composer('components.navbar', function ($view) {
        $menus = Menu::with('children')
            ->whereNull('parent_id')
            ->where('status', 'aktif')
            ->orderBy('urutan')
            ->get();

        $view->with('menus', $menus);
    });
}
}
