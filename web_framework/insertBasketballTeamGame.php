<?php
	session_start();
	$conn = new mysqli('localhost', 'lawingtr', '900599349', '4800-191-t3');
	$sql1 = "SELECT id FROM users WHERE username  = '{$_SESSION['username']}'";
	$result = $conn->query($sql1);
	$row = $result->fetch_assoc();
	
	$id = $row['id'];
	$name = $_GET["team_name"];
	$date = $_GET["date"];
	$points = $_GET["points"];
	$rebounds = $_GET["rebounds"];
	$assists = $_GET["assists"];
	$steals = $_GET["steals"];
	$blocks = $_GET["blocks"];
	$turnovers = $_GET["turnovers"];
	$fga = $_GET["fga"];
	$fgm = $_GET["fgm"];
	$threeattemps = $_GET["3pa"];
	$threemade = $_GET["3pm"];
	$fta = $_GET["fta"];
	$ftm = $_GET["ftm"];
	$opponentName = $_GET["ateam_name"];
	$result = $_GET["result"];
	$location = $_GET["location"];

	
	$sql = "INSERT INTO basketballTeamGame (userkey, teamname, date, points, rebounds, assists,
		steals, blocks, turnovers, fga, fgm, 3pa, 3pm, fta, ftm, opponentname, result, location) 
		VALUES ('$id','$name','$date','$points','$rebounds','$assists','$steals','$blocks',
		'$turnovers','$fga','$fgm','$threeattemps','$threemade','$fta','$ftm','$opponentName',
		'$result','$location')";

	if ($conn->query($sql) === TRUE) {
    	  echo "New record created successfully";
	} else {
      	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>