<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Product
     */
    public $product;

    /**
     * @var string
     */
    public $link;

    /**
     * Create a new message instance.
     *
     * @param $product
     * @param $link
     */
    public function __construct($product, $link)
    {
        $this->product = $product;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.product');
    }
}
