<?php
$auth = '7860735105';

include_once "inc/inc.mysql.connect.php";
include_once "func.php";




include_once "incpages/header.php";

if (!$_GET) {
				include_once "incpages/home.php";
} elseif ($_GET['p'] == "i") {
				include_once "incpages/home.php";
} elseif ($_GET['p'] == "t") {
				include_once "incpages/top.php";
} else {
				include_once "incpages/404.php";
}

include_once "incpages/footer.php";
?>