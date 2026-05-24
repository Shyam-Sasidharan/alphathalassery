<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Quote extends Mailable
{
    use Queueable, SerializesModels;

    private $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content = [])
    {
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS' ,'no-reply@smartlifetech.com'), env('MAIL_FROM_NAME' ,config('app.name')))
            ->subject($this->content['subject'] ? $this->content['subject'] : 'You have a new notification from '.config('app.name'))
            ->view('emails.quote-template')
            ->with('content', $this->content);
    }
}
