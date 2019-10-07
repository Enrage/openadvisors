<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FrvProf extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('FRV-prof Report')
            ->view('emails.frv')
            ->text('emails.frv_plain')
            ->with(['data' => $this->data])
            ->attach($this->data->file_path, [
                'as' => 'frv_prof.xlsx'
            ]);
    }
}