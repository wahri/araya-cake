<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $user = Auth::user();
            $sessionId = Session::getId();
            $cartCount = Cart::where(['session_id' => $sessionId])->sum('quantity');
        
            $view->with([
                'user' => $user,
                'cartCount' => $cartCount,
            ]);
        });

    }
}
