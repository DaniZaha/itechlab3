<?php 

$dsn = "mysql:host=localhost;dbname=itech_lab1";
$user = "root";
$pass = "";

$selector = $_GET['selector'];

$sqlPlayers = "SELECT player.ID_Player, player.name FROM player";
$sqlLeagues = "SELECT DISTINCT team.league FROM team";


try {

  $dbh = new PDO($dsn, $user, $pass);

  switch ($selector) {
  	case 'players':
  		
  		foreach ($dbh->query($sqlPlayers) as $row) {
        	echo "<option value=\"".$row['ID_Player']."\">".$row['name']."</option>";
      	}

  		break;

  	case 'leagues':
  		
  		foreach ($dbh->query($sqlLeagues) as $row) {
        	echo "<option value=\"".$row['league']."\">".$row['league']."</option>";
      	}

  		break;
  }

} catch (PDOException $ex) {

  echo $ex->GetMessage();

}

$dbh = null;

?>