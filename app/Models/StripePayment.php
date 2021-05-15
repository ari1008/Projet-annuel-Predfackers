<?php


namespace app\Models;

class StripePayment{
    private $apiKey="sk_test_51If93cDjT9p43wh3c6HJydjOAy4d8mJtLd8ZVeZT5JpLWCJ1KuNWuqdyAmqUpeI9U7C8kLzrYoIvB6pofqNL2hLd009CskQBGn";

    public function __construct($payment, $id,$url)
    {
        \Stripe\Stripe::setApiKey('sk_test_51If93cDjT9p43wh3c6HJydjOAy4d8mJtLd8ZVeZT5JpLWCJ1KuNWuqdyAmqUpeI9U7C8kLzrYoIvB6pofqNL2hLd009CskQBGn');
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => $payment["name"],
                'description' => $payment["description"],
                //'images' => [''],
                'amount' => $payment["price"]*100,
                'currency' => 'eur',
                'quantity' => 1,
            ]],
            "client_reference_id" => "12345",
            'customer_email' => "aristide.ff@gmail.com",
            'success_url' => $url[0],
            'cancel_url' => $url[1],
            "metadata"=> ["idUser" => $_SESSION["id"]],
        ]);
    }

}