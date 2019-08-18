<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ConvertCurrencyTrait;

class PaymentController extends Controller
{
    use ConvertCurrencyTrait;
    public function getStripeForm()
    {
        return view('stripe.index');
    }

    public function postStripePayment(Request $r)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $user = auth()->user();
        $price = $this->convertWithEnvRate($r->credits) * 100;
        $description = $user->email . " bought credits";
        $charge = Charge::create([
            'amount' => $price,
            'currency' => 'eur',
            'source' => $r->stripeToken,
            'description' => $description
        ]);

        if ($charge->status == 'succeeded') {
            $user->credit_amount +=  $r->credits;
            $user->save();
        }
        return redirect('/credits')->with('message', $r->credits . ' creunits were added to your account.');
    }
}
