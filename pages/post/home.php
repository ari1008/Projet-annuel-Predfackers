<script>
    function showProduct(category, mark) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("Buy").innerHTML = this.responseText;
            }
        };
        let url = "http://three.local/Projet-annuel-Predfackers/public/everyone.php?p=product&category="+category+"&mark="+mark;
        console.log(url);
        xmlhttp.open("GET",url,true);
        xmlhttp.send();

    }

    function view(){
        let selectCategory = document.getElementById("category").value;
        let selectMark = document.getElementById("mark").value;
        showProduct(selectCategory,selectMark);
    }


</script>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use \APP\Bootstrap\Form;
use  APP\Table\Category;
use APP\Table\Mark;
use APP\Table\Warehouse;

$mark = new Mark();
$mark->getPdo();
$resultsMark = $mark->markId();
$category =  new Category();
$category->getPdo();
$resultsCategory = $category->categoryID();
$product = new Form();
echo $product::selectJS($resultsCategory,gettext("Catégory"), "category", "view");
echo $product::selectJS($resultsMark,gettext("Mark"), "mark", "view");

?>



<div id="Buy" class="container">
</div>


