<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\SendCustomerMail;
class OrderDeliveredListener implements ShouldQueue
{
    
    public function handle($event)
    {
        sleep(5);
        Mail::to($event->user->email)->send(new SendCustomerMail());
        
    }
}
