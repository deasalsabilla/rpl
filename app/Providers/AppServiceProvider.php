<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\HakAkses;
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
        view()->composer('*', function ($view) {
            $menus = collect();

            if ($user = Auth::user()) {
                if ($user->role == 1) {
                    // Sidebar: hanya parent + child dropdown
                    $menus = Menu::with('children')
                        ->whereNull('parent_id')
                        ->orderBy('urutan')
                        ->get();
                } else {
                    $menus = Menu::with(['children' => function ($q) use ($user) {
                        $q->whereHas('hakAkses', function ($qa) use ($user) {
                            $qa->where('role_id', $user->role)
                                ->where('can_view', 1);
                        });
                    }])
                        ->whereHas('hakAkses', function ($q) use ($user) {
                            $q->where('role_id', $user->role)
                                ->where('can_view', 1);
                        })
                        ->whereNull('parent_id')
                        ->orderBy('urutan')
                        ->get();
                }
            }

            $view->with('menus', $menus);
        });
    }
}
