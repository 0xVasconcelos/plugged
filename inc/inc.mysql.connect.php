<?php
e_once "inc/inc.db.php";

$a=mysql_connect($host,$user,$pass);
	if (!$a){
			die('Could not connect: ' . mysql_error()); 
		}
 	mysql_select_db($db, $a);



?>
