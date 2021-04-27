<?php 
header("Content-Type: text/xml");
header("Cache-Control: no-cache, must-revalidate");

$dsn = "mysql:host=localhost;dbname=itech_lab1";
$user = "root";
$pass = "";
$dbh = new PDO($dsn, $user, $pass);

$league = $_GET['league'];

$sqlSelect = "SELECT * FROM game
WHERE game.FID_Team1 IN(SELECT ID_TEAM FROM team WHERE team.league = :league)
OR game.FID_Team2 IN(SELECT ID_TEAM FROM team WHERE team.league = :league)";

$sth = $dbh->prepare($sqlSelect);
$sth->execute(array(":league" => $league));
$res = $sth->fetchAll(PDO::FETCH_NUM);

echo '<?xml version="1.0" encoding="utf8"?>';
echo "<root>";
foreach ($res as $row) {
	$ID = $row[0];
	$DATE = $row[1];
	$PLACE = $row[2];
	$SCORE = $row[3];
	$T1 = $row[4];
	$T2 = $row[5];

	print "<row><id>$ID</id> <Date>$DATE</Date> <Place>$PLACE</Place> <Score>$SCORE</Score> <t1>$T1</t1> <t2>$T2</t2></row>";

}
echo "</root>";


?>