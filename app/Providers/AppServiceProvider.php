<?php

namespace App\Providers;

use App\Models\User;

use App\Models\OTPPoints;
use Illuminate\Support\Carbon;
use Illuminate\pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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


        //this line for delete all otp after 5 mints
        $minutes  = Carbon::now()->subMinutes( 10 );
        OTPPoints::where('created_at', '<=', $minutes)->delete();


        Paginator::useBootstrap();
        Schema::defaultStringLength(191);


        View::composer('*', function ($view) {
            $onlineUsersCount = User::where('last_seen', '>=', now()->subMinutes(5))->count();
            $view->with('onlineUsersCount', $onlineUsersCount);
        });
    }
}
