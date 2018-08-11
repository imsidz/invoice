<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Client;
use App\Product;


class SendInvoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $priceinword;
    protected $number;
    protected $products;
    protected $invoice;
    protected $company;
    protected $client;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($priceinword,$number,$products,$invoice,$company, Client $client)
    {   
        $this->priceinword = $priceinword;
        $this->number = $number;
        $this->products = $products;
        $this->invoice = $invoice;
        $this->company = $company;
        $this->client = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.invoice')
                        ->subject('Invoice For Your Product')
                        ->attach(public_path().'/pdf/invoice/' . str_replace('/', '-', $this->invoice->invoiceno) . '.pdf')
                        ->with([
                                'name' => $this->client->name,
                                'emails' => $this->client->emails,
                                'phones' => $this->client->phones,
                                'address' => $this->client->address,
                                'city' => $this->client->city,
                                'zip' => $this->client->zip,
                                'invoice' => $this->invoice->invoiceno,
                                'products' => $this->products,
                            ]);
    }
}
