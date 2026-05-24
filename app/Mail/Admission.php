<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Admission extends Mailable
{
    //use Queueable, SerializesModels;

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
    public function build() //no-reply@creativegraphics.com
    {//pravi0025@gmail.com
        $rtn =  $this->from(env('MAIL_FROM_ADDRESS' ,'livin@soarmorrow.com'), env('MAIL_FROM_NAME' ,\request('name')))
            ->subject($this->content['subject'] ? $this->content['subject'] : 'You have a new notification from '.config('app.name'));
            
            if(isset($this->content['certificate']) && $this->content['certificate']!=''){
                $rtn->attach($this->content['certificate'], [
                    'as' => basename($this->content['certificate']), 
                    'mime' => 'application/pdf'
                ]);
            }
            if(isset($this->content['photo']) && $this->content['photo']!=''){
                $rtn->attach($this->content['photo'], [
                    'as' => basename($this->content['photo']), 
                    'mime' => 'application/pdf'
                ]);
            }
            if(isset($this->content['fee']) && $this->content['fee']!=''){
                $rtn->attach($this->content['fee'], [
                    'as' => basename($this->content['fee']), 
                    'mime' => 'application/pdf'
                ]);
            }
            
            
            
            $rtn->view('emails.admission_template')
            ->with('content', $this->content);

            return $rtn;
    }
}
