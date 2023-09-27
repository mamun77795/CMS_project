<?php

namespace App\Providers;

use App\Models\District;
use App\Models\Mail;
use App\Modules\Customer\Models\Customer;
use App\Modules\Customer\Models\Message;
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

        View::composer('dashboard', function($view){
            $data = Customer::all();
            $data2 = District::all();
            $customers = count($data);
            $districts = count($data2);

            $lastsms = Message::latest()->first();
            $lastmail = Mail::latest()->first();
            $view->with('customers', $customers)
                 ->with('districts', $districts)
                 ->with('lastsms', $lastsms)
                 ->with('lastmail', $lastmail);
        });
    }
}
