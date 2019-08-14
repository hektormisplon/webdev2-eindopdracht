<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getStripeForm()
    {
        return view('stripe.index');
    }

    public function postStripePayment(Request $r)
    {
        //
    }
}
