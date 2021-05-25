<?php
use APP\Table\Verification;
$verification = new Verification();
$verification->getPdo();
$verification->update($_GET['product'],5);
header('Location: client.php');
exit(200);
