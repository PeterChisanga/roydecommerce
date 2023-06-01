<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Order;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($orders)
    {
         $this->orders = $orders;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('contact@websitetestingpeterchisanga.tech','KAMALA SUPPLIERS LIMITED'),
            replyTo: [
            new Address('contact@websitetestingpeterchisanga.tech', 'KAMALA SUPPLIERS LIMITED'),
            ],
            subject: "Your Order",
        );
    }

    public function build(): self
    {
        return $this->view('emails.orders.confirmed')
                    ->with(['orders' => $this->orders]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
