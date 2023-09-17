<?php

namespace App\Providers;

use App\Models\Mail;
use Illuminate\Support\Facades\View;
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
        View::composer('email.mail', function ($view) {
            $data = Mail::latest()->first();
            $view->with('emailData', $data);
        });
    }
}
