<?php

namespace App\Jobs;

use App\Mail\ConfirmedOrderMail;
use App\Models\Order;
use App\Models\WebsiteSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AppointmentConfirmationMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $email; 
    private $objDemo; 

    public function __construct($objDemo,$email)
    { 
        $this->email = $email;
        $this->objDemo = $objDemo;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    { 
        
        Mail::to('info@petsconciergeksa.com')->send(new \App\Mail\Appointment($this->objDemo)); 
        Mail::to($this->email)->send(new \App\Mail\ConfirmAppointment($this->objDemo)); 
    }
}
