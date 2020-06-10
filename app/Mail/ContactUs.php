<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    private $message;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $name;

    /**
     * Create a new message instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->message = $data['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     *
     */
    public function build()
    {
        return $this
                ->from(config('mail.from.address'), $this->name)
                ->to(config('mail.to.address'), config('mail.to.name'))
                ->markdown('notice-admin', ['message'=> $this->message, 'email'=>$this->email, 'name' =>$this->name])
                ->subject('Question from ' . $this->name);
    }
}
