<?php

namespace App\Mail;

use App\Models\Schedule;
use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetSchedule extends Mailable
{
    use Queueable, SerializesModels;

    public $schedule;
    public $service;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Schedule $schedule, Service $service)
    {
        $this->schedule = $schedule;
        $this->service = $service;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.email.set_schedule')->subject('SUBAS');
    }
}
