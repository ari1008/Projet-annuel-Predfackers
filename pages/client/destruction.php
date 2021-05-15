<?php
use APP\Table\Verification;
$verification = new Verification();
$verification->getPdo();
$verification->update($_GET['product'],2);
header('Location: client.php');
exit(200);