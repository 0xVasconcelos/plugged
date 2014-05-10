<?php
/* PLUG.GED 0.1 
Sistema de gerenciamento para plug.dj.
Criado por Lucas Vasconcelos(@lucaslg26)
Com a ajuda de Luiz Eduardo(@Caipira).
*/
if (empty($auth)) {
                header("location:/index.php");
                die();
}

require_once "inc/inc.mysql.connect.php";


$Stats            = mysql_query("SELECT * FROM `userhistory` ORDER BY id DESC LIMIT 1");
$RoomStats        = mysql_fetch_array($Stats);
$UsersOnlineCount = $RoomStats[1];

$result           = mysql_query("SELECT id FROM `videohits`");
$PlayedVideoCount = mysql_num_rows($result);

$result         = mysql_query("SELECT id FROM `videos`");
$PlayVideoCount = mysql_num_rows($result);

$result             = mysql_query("SELECT SUM(positive) as SOMA FROM videohits");
$PositiveVideoCount = mysql_fetch_assoc($result);
$PositiveVideoCount = $PositiveVideoCount['SOMA'];

$result            = mysql_query("SELECT SUM(curates) as SOMA FROM videohits");
$CuratesVideoCount = mysql_fetch_assoc($result);
$CuratesVideoCount = $CuratesVideoCount['SOMA'];

$result             = mysql_query("SELECT SUM(negative) as SOMA FROM videohits");
$NegativeVideoCount = mysql_fetch_assoc($result);
$NegativeVideoCount = $NegativeVideoCount['SOMA'];

$result  = mysql_query("SELECT COUNT(id) as SOMA FROM users");
$DJCount = mysql_fetch_assoc($result);
$DJCount = $DJCount['SOMA'];




function GetLastPlayed() {
                
                
                
                $result = mysql_query("SELECT * FROM videos ORDER BY id DESC LIMIT 20");
                while ($row = mysql_fetch_array($result)) {
                                echo "<tr>
                                        <td>" . $row['name'] . "-" . $row['author'] . "</td>
                                        <td>" . $row['user'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                        <td>" . gmdate("H:i:s d/m/y", $row['time'] - 10800) . "</td>
                                        <td>" . $row['counter'] . "</td>
                                    </tr>";
                }
}
function MorePlayedList() {
                echo "<table class='table table-bordered table-hover'>

                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th class='span1'><span class='label label-success'>Legal</span></th>
                                        <th class='span1'><span class='label label-info'>Add</span></th>
                                        <th class='span1'><span class='label label-important'>Chato</span></th>
                                        <th class='span1'>Nº de Vezes tocado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <h2><span class='awe-star'></span> As mais tocadas</h2>";
                
                $result = mysql_query("SELECT * FROM videohits ORDER BY hits DESC LIMIT 10");
                while ($row = mysql_fetch_array($result)) {
                                
                                echo "<tr>
                                        <td>" . $row['name'] . "-" . $row['author'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                        <td>" . $row['hits'] . "</td>
                                    </tr>";
                }
                echo "</tbody></table>";
}

function MorePositiveList() {
                echo "<table class='table table-bordered table-hover'>

                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th class='span1'><span class='label label-success'>Legal</span></th>
                                        <th class='span1'><span class='label label-info'>Add</span></th>
                                        <th class='span1'><span class='label label-important'>Chato</span></th>
                                        <th class='span1'>Nº de Vezes tocado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <h2><span class='awe-star'></span> As mais legais</h2>";
                
                $result = mysql_query("SELECT * FROM videohits ORDER BY positive DESC LIMIT 10");
                while ($row = mysql_fetch_array($result)) {
                                
                                echo "<tr>
                                        <td>" . $row['name'] . "-" . $row['author'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                        <td>" . $row['hits'] . "</td>
                                    </tr>";
                }
                echo "</tbody></table>";
}
function MoreCuratesList() {
                echo "<table class='table table-bordered table-hover'>

                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th class='span1'><span class='label label-success'>Legal</span></th>
                                        <th class='span1'><span class='label label-info'>Add</span></th>
                                        <th class='span1'><span class='label label-important'>Chato</span></th>
                                        <th class='span1'>Nº de Vezes tocado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <h2><span class='awe-star'></span> As mais adicionadas</h2>";
                
                $result = mysql_query("SELECT * FROM videohits ORDER BY curates DESC LIMIT 10");
                while ($row = mysql_fetch_array($result)) {
                                
                                echo "<tr>
                                        <td>" . $row['name'] . "-" . $row['author'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                        <td>" . $row['hits'] . "</td>
                                    </tr>";
                }
                echo "</tbody></table>";
}
function MoreNegativeList() {
                echo "<table class='table table-bordered table-hover'>

                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th class='span1'><span class='label label-success'>Legal</span></th>
                                        <th class='span1'><span class='label label-info'>Add</span></th>
                                        <th class='span1'><span class='label label-important'>Chato</span></th>
                                        <th class='span1'>Nº de Vezes tocado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <h2><span class='awe-star'></span> As mais chatas</h2>";
                
                $result = mysql_query("SELECT * FROM videohits ORDER BY negative DESC LIMIT 10");
                while ($row = mysql_fetch_array($result)) {
                                
                                echo "<tr>
                                        <td>" . $row['name'] . "-" . $row['author'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                        <td>" . $row['hits'] . "</td>
                                    </tr>";
                }
                echo "</tbody></table>";
}



function MorePlayedDJList() {
                echo "<table class='table table-bordered table-hover'>

                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th class='span1'><span class='label label-success'>Legal</span></th>
                                        <th class='span1'><span class='label label-info'>Add</span></th>
                                        <th class='span1'><span class='label label-important'>Chato</span></th>
                                        <th class='span1'>Nº de Vezes que tocou</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <h2><span class='awe-star'></span> DJ's que mais tocaram</h2>";
                
                $result = mysql_query("SELECT * FROM users ORDER BY hits DESC LIMIT 10");
                while ($row = mysql_fetch_array($result)) {
                                
                                echo "<tr>
                                        <td>" . $row['user'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                        <td>" . $row['hits'] . "</td>
                                    </tr>";
                }
                echo "</tbody></table>";
}


function MorePositiveDJList() {
                echo "<table class='table table-bordered table-hover'>

                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th class='span1'><span class='label label-success'>Legal</span></th>
                                        <th class='span1'><span class='label label-info'>Add</span></th>
                                        <th class='span1'><span class='label label-important'>Chato</span></th>
                                        <th class='span1'>Nº de Vezes que tocou</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <h2><span class='awe-star'></span> DJ's mais legais</h2>";
                
                $result = mysql_query("SELECT * FROM users ORDER BY positive DESC LIMIT 10");
                while ($row = mysql_fetch_array($result)) {
                                
                                echo "<tr>
                                        <td>" . $row['user'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                        <td>" . $row['hits'] . "</td>
                                    </tr>";
                }
                echo "</tbody></table>";
}


function MoreCuratesDJList() {
                echo "<table class='table table-bordered table-hover'>

                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th class='span1'><span class='label label-success'>Legal</span></th>
                                        <th class='span1'><span class='label label-info'>Add</span></th>
                                        <th class='span1'><span class='label label-important'>Chato</span></th>
                                        <th class='span1'>Nº de Vezes que tocou</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <h2><span class='awe-star'></span> DJ's mais adicionados</h2>";
                
                $result = mysql_query("SELECT * FROM users ORDER BY curates DESC LIMIT 10");
                while ($row = mysql_fetch_array($result)) {
                                
                                echo "<tr>
                                        <td>" . $row['user'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                        <td>" . $row['hits'] . "</td>
                                    </tr>";
                }
                echo "</tbody></table>";
}

function MoreNegativeDJList() {
                echo "<table class='table table-bordered table-hover'>

                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th class='span1'><span class='label label-success'>Legal</span></th>
                                        <th class='span1'><span class='label label-info'>Add</span></th>
                                        <th class='span1'><span class='label label-important'>Chato</span></th>
                                        <th class='span1'>Nº de Vezes que tocou</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <h2><span class='awe-star'></span> DJ's mais chatos</h2>";
                
                $result = mysql_query("SELECT * FROM users ORDER BY negative DESC LIMIT 10");
                while ($row = mysql_fetch_array($result)) {
                                
                                echo "<tr>
                                        <td>" . $row['user'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                        <td>" . $row['hits'] . "</td>
                                    </tr>";
                }
                echo "</tbody></table>";
}

function MorePositiveUniqueList() {
                echo "<table class='table table-bordered table-hover'>

                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th class='span1'><span class='label label-success'>Legal</span></th>
                                        <th class='span1'><span class='label label-info'>Add</span></th>
                                        <th class='span1'><span class='label label-important'>Chato</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <h2><span class='awe-star'></span> As mais adicionadas</h2>";
                
                $result = mysql_query("SELECT * FROM videos ORDER BY positive DESC LIMIT 10");
                while ($row = mysql_fetch_array($result)) {
                                
                                echo "<tr>
                                        <td>" . $row['name'] . "-" . $row['author'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                    </tr>";
                }
                echo "</tbody></table>";
}
function MoreCuratesUniqueList() {
                echo "<table class='table table-bordered table-hover'>

                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th class='span1'><span class='label label-success'>Legal</span></th>
                                        <th class='span1'><span class='label label-info'>Add</span></th>
                                        <th class='span1'><span class='label label-important'>Chato</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <h2><span class='awe-star'></span> As mais adicionadas</h2>";
                
                $result = mysql_query("SELECT * FROM videos ORDER BY curates DESC LIMIT 10");
                while ($row = mysql_fetch_array($result)) {
                                
                                echo "<tr>
                                        <td>" . $row['name'] . "-" . $row['author'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                    </tr>";
                }
                echo "</tbody></table>";
}
function MoreNegativeUniqueList() {
                echo "<table class='table table-bordered table-hover'>

                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th class='span1'><span class='label label-success'>Legal</span></th>
                                        <th class='span1'><span class='label label-info'>Add</span></th>
                                        <th class='span1'><span class='label label-important'>Chato</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <h2><span class='awe-star'></span> As mais adicionadas</h2>";
                
                $result = mysql_query("SELECT * FROM videos ORDER BY negative DESC LIMIT 10");
                while ($row = mysql_fetch_array($result)) {
                                
                                echo "<tr>
                                        <td>" . $row['name'] . "-" . $row['author'] . "</td>
                                        <td>" . $row['positive'] . "</td>
                                        <td>" . $row['curates'] . "</td>
                                        <td>" . $row['negative'] . "</td>
                                    </tr>";
                }
                echo "</tbody></table>";
}