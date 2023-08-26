<?php

namespace App\Providers;

use Illuminate\
    {
        Support\ServiceProvider,
        Support\Facades\DB
    };
    use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {

        view()->composer('*',function($settings){
            $settings->with('setting', DB::table('settings')->find(1));
            $settings->with('extra_settings', DB::table('extra_settings')->find(1));

            if (!session()->has('popup'))
            {
                view()->share('visit', 1);
            }
            session()->put('popup' , 1);
        });


        Paginator::defaultView('vendor.pagination.default');
        //Paginator::defaultView('vendor.pagination.bootstrap-4');
        //Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-4');
    }

    public function register()
    {

    }
}
