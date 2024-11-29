<?php

namespace App\Jobs;

use App\Mail\SendOtp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;



    /**

     * Create a new job instance.

     *

     * @return void

     */

    public function __construct($data)

    {

        $this->data = $data;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('email@gmail.com')->send(new SendOtp($this->data));
        Mail::to('email@gmail.com')->send(new SendOtp($this->data));
        Mail::to('email@gmail.com')->send(new SendOtp($this->data));
        Mail::to('email@gmail.com')->send(new SendOtp($this->data));
        return;
    }
}
