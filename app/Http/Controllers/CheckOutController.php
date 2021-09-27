<?php

namespace App\Http\Controllers;

use App\Models\PaymentSceduling;
use App\Services\Payment\PaymentService;
use Illuminate\Http\Request;
use Session;
class CheckOutController extends Controller
{
    public function checkout(Request $request)
    {
        // $details = PaymentSceduling::where('continue', 1)->first();
        
        $message = $request->messages;
        $price = $request->price;
        $continue = $request->continue;
        Session::put('message', $message);
        Session::put('price', $price);
        Session::put('continue', $continue);
        return redirect()->route('payment');
    }

    public function payment () {
        return view('Backend.Stripe.payment');
    }
}
