<?php

namespace App\Http\Controllers;

use App\Models\PaymentSceduling;
use App\Services\Payment\PaymentService;
use Illuminate\Http\Request;
use Session;
use Stripe;

use function GuzzleHttp\Promise\all;

class StripeController extends Controller
{
    



    public function stripePost(Request $request)
    {

        $validated = $request->validate([
            'card_name' => 'required',
            'card_number' => 'required',
            'card_cvc' => 'required',
            'expire_day' => 'required',
            'expire_year' => 'required',

        ]); 
        
        $payment = new PaymentService($request->all());
        $payment->payment();
        PaymentSceduling::updateOrCreate(["user_id" => auth()->id()],[
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->name,
            'card_name' => $request->card_name,
            'card_number' => $request->card_number,
            'card_cvc' => $request->card_cvc,
            'expire_day' => $request->expire_day,
            'expire_year'  => $request->expire_year,
            'currency' => "usd",
            'description' => "hi i'm using Stripe for payment",
            'continue' => $request->continue ? 1 : 0,
            'messages' => $request->message,
            'price' => $request->price,
        ]);
        
   
        Session::flash('success', 'Payment successful!');
           
        return redirect()->route('message');
    }
}
