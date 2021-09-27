<?php

namespace App\Services\Payment;
use Session;
use Stripe;
class PaymentService 
{
    protected $stripeObject;

    public function __construct($stripeObject) {
        $this->stripeObject = $stripeObject;

    }

    public function payment() {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100*$this->stripeObject['price'],
                "currency" => 'usd',
                "source" => $this->stripeToken(),
                "description" => 'hello this is description',
        ]);
    }

    public function stripeToken () {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_KEY')
          );
       $response = $stripe->tokens->create([
            'card' => [
              'number' => $this->stripeObject['card_number'],
              'exp_month' => $this->stripeObject['expire_day'],
              'exp_year' => $this->stripeObject['expire_year'],
              'cvc' => $this->stripeObject['card_cvc']
            ],
          ]);

          return $response->id;
    }

}