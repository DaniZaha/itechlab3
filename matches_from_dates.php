<?php 

$dsn = "mysql:host=localhost;dbname=itech_lab1";
$user = "root";
$pass = "";
$dbh = new PDO($dsn, $user, $pass);

$date1 = str_replace("-", "/", $_GET['datetime1']);
$date2 = str_replace("-", "/", $_GET['datetime2']);

if ($date1 != null and $date2 != null) {
	if ($date1 > $date2) {
		echo "First date must come before the second one";
		break;
	}else {
		// echo "Matches from $date1 to $date2";
	}
}else {
	echo "Dates are not defined";
	break;
}


$sqlSelect = "SELECT * FROM game
WHERE game.date BETWEEN ? and ? ";

$sth = $dbh->prepare($sqlSelect);
$sth->execute(array($date1, $date2));
$res = $sth->fetchAll();


foreach ($res as $row) {
	echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
}



?>