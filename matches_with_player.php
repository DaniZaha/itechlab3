<?php 
header("Content-Type: application/json");
header("Cache-Control: no-cache, must-revalidate");

$dsn = "mysql:host=localhost;dbname=itech_lab1";
$user = "root";
$pass = "";
$dbh = new PDO($dsn, $user, $pass);

$player = $_GET['player'];

$sqlSelect = "SELECT * FROM game
WHERE game.FID_Team1 IN (SELECT FID_Team FROM player WHERE player.ID_Player = :player)
OR game.FID_Team2 IN (SELECT FID_Team FROM player WHERE player.ID_Player = :player)";

$sth = $dbh->prepare($sqlSelect);
$sth->execute(array(":player" => $player));
$res = $sth->fetchAll(PDO::FETCH_OBJ);
echo json_encode($res);


?>