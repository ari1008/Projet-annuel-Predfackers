<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use \APP\Table\Verification;
use \APP\Table\User;
$user = new User();
$user->getPdo();
$description = $user->user($_SESSION['id']);
$verification = new Verification();
$verification->getPdo();
$payment = $verification->viewVerificationNewPrice($_GET["product"]);
var_dump($payment);
require_once(ROOT_FOLDER .'/vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_51If93cDjT9p43wh3c6HJydjOAy4d8mJtLd8ZVeZT5JpLWCJ1KuNWuqdyAmqUpeI9U7C8kLzrYoIvB6pofqNL2hLd009CskQBGn');

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'name' => $payment["name"],
        'description' => $payment["description"] ,
        //'images' => 'http://three.local/Projet-annuel-Predfackers/public/pictures/product/' .$payment["photo"],
        'amount' => $payment["price"]*100*1.3,
        'currency' => 'eur',
        'quantity' => 1,
    ]],
    "client_reference_id" => $description["id"],
    'customer_email' => $description["email"],
    'success_url' => 'http://three.local/Projet-annuel-Predfackers/public/client.php?p=successProduct&product='.$_GET["product"].'&session_id={CHECKOUT_SESSION_ID}',
    'cancel_url' => 'http://three.local/Projet-annuel-Predfackers/public/client.php?p=cancelProduct&product='.$_GET["product"].'&session_id={CHECKOUT_SESSION_ID}',
    "metadata"=> ["idUser" => $description["id"]],
]);
?>
?>
<h3>Vous allez être redirigé vers stripe pour le paiement</h3><br>
<button type="button" onclick="buy()">OK</button>

</body>
<script src="https://js.stripe.com/v3/"></script>
<script src="jquery.js"></script>
<script type="text/javascript">
    var stripe = Stripe("pk_test_51If93cDjT9p43wh3cm09BDATH98cWFgqL4g2fFPyiDoBoGg0q9TjyVEc53XmO4Qg6in68DtSq6Inhflt79an1d9a002kc76yZw");

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