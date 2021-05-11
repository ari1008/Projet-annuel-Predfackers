<?php
require_once(ROOT_FOLDER .'/vendor/autoload.php');

\Stripe\Stripe::setApiKey('sk_test_9bT77JdwRJaBD1Mn0YJj1Zb600k6QROR7E');

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'name' => 'Aristide',
        'description' => "beau produit",
        //'images' => [''],
        'amount' => 1000,
        'currency' => 'eur',
        'quantity' => 1,
    ]],
    "client_reference_id" => $_SESSION["id"],
    'customer_email' => "aristide.ff@gmail.com",
    'success_url' => 'http://localhost/projetAnuel2020/webPart/shop/payment.php?session_id={CHECKOUT_SESSION_ID}',
    'cancel_url' => 'http://localhost/projetAnuel2020/webPart/shop/payment.php?session_id={CHECKOUT_SESSION_ID}',
]);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Payer avec stripe</title>
  </head>
  <body>

    <center><h3>Vous allez être redirigé vers stripe pour le paiement</h3><br>
      <button type="button" onclick="buy()">OK</button></center>

  </body>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="jquery.js"></script>
  <script type="text/javascript">
  var stripe = Stripe("pk_test_2Nm9mC8Kbr9BA2kBP6kOcEhM00yrbTJf1D");

  function buy() {
      stripe.redirectToCheckout({
      // Make the id field from the Checkout Session creation API response
      // available to this file, so you can provide it as parameter here
      // instead of the {{CHECKOUT_SESSION_ID}} placeholder.
    sessionId: '<?php echo $session->id; ?>'
    }).then(function (result) {
          // If `redirectToCheckout` fails due to a browser or network
          // error, display the localized error message to your customer
          // using `result.error.message`..
      });
  }

   setTimeout(function(){ buy() }, 500);

  </script>
</html>