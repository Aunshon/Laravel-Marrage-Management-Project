<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use Stripe;
use Auth;
use App\Order;

class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe()

    {

        return view('stripe');
    }



    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([

            "amount" => 100 * $request->moneyAmount,

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Paid By " . Auth::user()->email,

        ]);

        Order::find($request->orderid)->update([
            'payment_status' => 2,
        ]);
        return redirect('/');

        // Session::flash('success', 'Payment successful!');



        // return back();
    }
}
