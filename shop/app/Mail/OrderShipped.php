<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $customerOrder;
    protected $cartOrder;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerOrder, $cartOrder)
    {
        $this->customerOrder = $customerOrder;
        $this->cartOrder = $cartOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.success')
                    ->subject("Order Shipped")
                    ->with([
                        'customerOrder' => $this->customerOrder,
                        'cartOrder' => $this->cartOrder
                    ]);
    }
}
