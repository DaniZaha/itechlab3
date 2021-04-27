<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LAB 3</title>
</head>
<body>

  <?php
    $dsn = "mysql:host=localhost;dbname=itech_lab1";
    $user = "root";
    $pass = "";

    $dbh = new PDO($dsn, $user, $pass);

    $sqlPlayers = "SELECT player.ID_Player, player.name FROM player";
    $sqlLeagues = "SELECT DISTINCT team.league FROM team";
  ?>

<div class="forms">

    <label for="datetime1"> Matches from </label>
    <input type="date" name="datetime1" id="datetime1" value="">
    <label for="datetime2"> to </label>
    <input type="date" name="datetime2" id="datetime2" value="">
    <input type="button" value="Matches from this interval" name="button" id="but1" onclick="get1()">

<br>

    <label for="player">Matches with</label>
    <select name="player" id="player"></select>
    <input type="button" value="Matches with this player" name="button" id="but2" onclick="get2()">

<br>

    <label for="league">Matches for</label>
    <select name="league" id="league"></select>
    <input type="button" value="Matches for this league" name="button" id="but3" onclick="get3()">

</div>

<script type="text/javascript" src="script.js"></script>

<br>

<h2>Result:</h2>

<table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>DATE</th>
        <th>PLACE</th>
        <th>SCORE</th>
        <th>T1</th>
        <th>T2</th>
      </tr>
    </thead>
    <tbody id="out">
      
    </tbody>
  </table>

<style>
  
.forms {
  padding-left: 50px;
  padding-right: 50px;
  background-color: black;
  color: white;
  display: inline-block;
}

table, th, td {
  border: 1px solid white;
  color: white;
  background-color: black;
}

td{
  padding: 5px;
}

input[type=button] {
  background-color: white;
  border: none;
  color: black;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  transition-duration: 0.4s;
}

input[type=button]:hover{
  background-color: #ddd;
}

</style>

</body>
</html>
