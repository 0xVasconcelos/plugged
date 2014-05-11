<?php

include_once "inc/inc.mysql.connect.php";

$user = $_GET['user'];





$result = mysql_query("SELECT * FROM users WHERE user='$user' ORDER BY id");

while ($row = mysql_fetch_array($result)) {
    echo "{\"users\":[
        {
            \"user\":\"" . $row['user'] . "\",
            \"hits\":\"" . $row['hits'] . "\",
            \"positive\":\"" . $row['positive'] . "\",
            \"negative\":\"" . $row['negative'] . "\",
            \"curates\":\"" . $row['curates'] . "\"
}]}";
}
if(!mysql_fetch_array($result)){

    echo "{\"users\":[
        {
            \"exists\":\"false\"
         
}]}";


}



?>