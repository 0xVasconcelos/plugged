<?php
/* PLUG.GED 0.1 
Sistema de gerenciamento para plug.dj.
Criado por Lucas Vasconcelos(@lucaslg26)
Com a ajuda de Luiz Eduardo(@Caipira).
*/

include_once "inc/inc.db.php";

$a=mysql_connect($host,$user,$pass);
	if (!$a){
			die('Could not connect: ' . mysql_error()); 
		}
 	mysql_select_db($db, $a);



?>