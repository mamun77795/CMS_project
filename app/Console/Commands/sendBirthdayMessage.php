<?php

namespace App\Console\Commands;

use App\Mail\MarriageAnniversary;
use App\Mail\WishMail;
use App\Modules\Customer\Models\Customer;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendBirthdayMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendsms:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatic message and email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today();
        $customers = Customer::whereMonth('date_of_birth', $today->month)
                     ->whereDay('date_of_birth', $today->day)
                     ->get();

        foreach ($customers as $customer) {
            sendSMS("Happy birthday to you from Elite Paint", $customer->phone);

            $emailcustom = new WishMail();
            Mail::to($customer->email)->send($emailcustom);
        }

        $customers = Customer::whereMonth('marriage_date', $today->month)
                     ->whereDay('marriage_date', $today->day)
                     ->get();

        foreach ($customers as $customer) {
            sendSMS("Happy marriage anniversary. Well wishes from Elite Paint", $customer->phone);

            $emailcustom = new MarriageAnniversary();
            Mail::to($customer->email)->send($emailcustom);
        }

        return $this->info('Messages sent successfully.');
    }
}
