<?php

namespace App\Providers;

use App\Models\User;
use App\Models\notify;

use App\Models\AdsStore;
use App\Models\category;
use App\Models\merchant;
use App\Models\OTPPoints;
use Illuminate\Support\Carbon;
use App\ViewComposer\SearchBar;
use Illuminate\pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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


        $time  = Carbon::now();
        AdsStore::
        where('status', 'activeAT')->
        where('startAds', '<=', $time)  
        ->update([
            'status'=>'active'
        ]);

        $time  = Carbon::now();
        AdsStore::where('endAds', '<=', $time)->update([
            'status'=>'انتهي'
        ]);


        Paginator::useBootstrap();
        Schema::defaultStringLength(191);


        View::composer('*', function ($view) {
            $onlineUsersCount = User::where('last_seen', '>=', now()->subMinutes(5))->count();
            $view->with('onlineUsersCount', $onlineUsersCount);
        });



        // view notifcation in all website
        View::composer('*', function ($view) {
            if (!request()->is('login')) {
                $notify  = notify::where('reseverId',Auth::User()->id)->limit(10)->orderBy('id','DESC')->get();
                $notifyCount = notify::where('reseverId',Auth::User()->id)
                ->where('readed','0')
                ->count();
                $notifyId = notify::where('reseverId',Auth::User()->id)->orderBy('id','DESC')->first();
                $view->with('notify', $notify);
                $view->with('notifyCount', $notifyCount);
                $view->with('notifyId', $notifyId);
            }

        });


        // view serch merchant and category
        View::composer('*', function ($view) {
            if (!request()->is('login')) {
                $merchants = User::where('subtype','merchant')->inRandomOrder()->get();
                $category = category::get('name');
                $view->with('merchants', $merchants);
                $view->with('category', $category);
            }

        });


        View::composer('*',SearchBar::class);




    }
}
