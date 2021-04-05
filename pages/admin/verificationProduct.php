<?php
use APP\Models\Verification;
$name = rand(0,4). basename($_FILES['photo']['name']);
$uploadfile = ROOT_FOLDER.'/public/pictures/product/' . $name;
?>

<div class="container overflow-hidden">
   <?php echo 1; ?>
</div>
