<?php

namespace App\Providers;

use App\Models\User;

use Illuminate\pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Carbon::setLocale('ar'); // to type date arabic

        Paginator::useBootstrap();
        Schema::defaultStringLength(191);


        View::composer('*', function ($view) {
            $onlineUsersCount = User::where('last_seen', '>=', now()->subMinutes(5))->count();
            $view->with('onlineUsersCount', $onlineUsersCount);
        });
    }
}
