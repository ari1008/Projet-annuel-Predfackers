<?php
use APP\Table\Mark;
$id_mark = $_GET["mark"];
$mark =  new Mark();
$mark->getPdo();
$results = $mark->ViewMark($id_mark);
unlink(ROOT_FOLDER . "/public/pictures/mark/" . $results["photo"]);
$mark->deleteMark($id_mark);
header("location: admin.php?p=mark");
exit();
