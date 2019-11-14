<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class CustomerMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build(Request $request)
    {
        $contact_form_data = array(
                'contact_form_name' => $request->input('contact_form_name'),
                'contact_form_surname' => $request->input('contact_form_surname'),
                'contact_form_email' => $request->input('contact_form_email')
        );
        return $this->view('emails.contact_form')->with($contact_form_data)
                    ->from('example@gmail.com','Wiadomosc od uzytkownika!');
    }
}
