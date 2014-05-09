<?php
error_reporting(0);
if ($_GET['pass'] == "9b80822a7c07ccda42816a6c94a5444179efdd9d") {
				
				$con = mysql_connect("localhost", "root", "2602");
				if (!$con) {
								die('Could not connect: ' . mysql_error());
				}
				
				mysql_select_db("plug", $con);
				
				
				if ($_POST['ytid']) { //HISTÓRICO DE VIDEOS TOCADOS
								mysql_query("SELECT * FROM videos");
								mysql_query("INSERT INTO videos (name, author, user, positive, curates, negative, ytid, time, count) VALUES ('" . $_POST['name'] . "', '" . $_POST['author'] . "', '" . $_POST['user'] . "', '" . $_POST['positive'] . "', '" . $_POST['curates'] . "', '" . $_POST['negative'] . "', '" . $_POST['ytid'] . "', '" . $_POST['time'] . "', '" . $_POST['usersonline'] . "')");
				}
				
				if ($_POST['usersonline']) { //QUANTIDADE DE USUÁRIOS ONLINE/LOG DE HORÁRIO
								mysql_query("SELECT * FROM userhistory");
								mysql_query("INSERT INTO userhistory (counter, time) VALUES ('" . $_POST['usersonline'] . "', '" . $_POST['time'] . "')");
				}
				
				
				if ($_POST['ytid']) { //QUANTIDADE DE VEZES QUE DETERMINADO VIDEO FI TOCADO
								$ytidQuery = mysql_query("SELECT * FROM `videohits` WHERE ytid='" . $_POST['ytid'] . "'");
								$ytQuery   = mysql_fetch_array($ytidQuery);
								if ($ytQuery != NULL) {
												$HitsNew     = $ytQuery[7] + 1;
												$NewNegative = $ytQuery[5] + $_POST['negative'];
												$NewCurates  = $ytQuery[4] + $_POST['curates'];
												$NewPositive = $ytQuery[3] + $_POST['positive'];
												mysql_query("DELETE FROM `videohits` WHERE `ytid`='" . $_POST['ytid'] . "'");
												mysql_query("INSERT INTO videohits (name, author, positive, curates, negative, ytid, hits) VALUES ('" . $_POST['name'] . "', '" . $_POST['author'] . "', '$NewPositive', '$NewCurates', '$NewNegative', '" . $_POST['ytid'] . "', '$HitsNew')");
								} else {
												mysql_query("INSERT INTO videohits (name, author, positive, curates, negative, ytid, hits) VALUES ('" . $_POST['name'] . "', '" . $_POST['author'] . "', '" . $_POST['positive'] . "', '" . $_POST['curates'] . "', '" . $_POST['negative'] . "', '" . $_POST['ytid'] . "', '1')");
								}
				}
				
				
				if ($_POST['user']) { //SALVA OS DJ's FAZ A CONTAGEM DE LEGAIS/CHATOS/ADDS E A QUANTIDADE DE VEZES QUE ELE JÁ TOCOU
								
								$usersQuery = mysql_query("SELECT * FROM `users` WHERE user='" . $_POST['user'] . "'");
								$userQuery  = mysql_fetch_array($usersQuery);
								if ($userQuery != NULL) {
												$HitsNew     = $userQuery[5] + 1;
												$NewNegative = $userQuery[4] + $_POST['negative'];
												$NewCurates  = $userQuery[3] + $_POST['curates'];
												$NewPositive = $userQuery[2] + $_POST['positive'];
												mysql_query("DELETE FROM `users` WHERE `user`='" . $_POST['user'] . "'");
												mysql_query("INSERT INTO users (user, positive, curates, negative, hits) VALUES ('" . $_POST['user'] . "', '$NewPositive', '$NewCurates', '$NewNegative', '$HitsNew')");
								} else {
												mysql_query("INSERT INTO users (user, positive, curates, negative, hits) VALUES ('" . $_POST['user'] . "', '" . $_POST['positive'] . "', '" . $_POST['curates'] . "', '" . $_POST['negative'] . "', '1')");
								}
				}
				
}

?>