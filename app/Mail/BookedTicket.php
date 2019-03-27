<?php

namespace App\Mail;

use App\{Event, EventPayment};
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookedTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    public $order;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $event, EventPayment $order)
    {
        $this->event = $event;
        $this->order = $order;     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tickets@myeventino.com')
                    ->markdown('emails.events.tickets');
    }
}
