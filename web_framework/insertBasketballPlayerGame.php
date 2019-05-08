<?php
	session_start();
	$conn = new mysqli('localhost', 'lawingtr', '900599349', '4800-191-t3');
	$sql1 = "SELECT id FROM users WHERE username  = '{$_SESSION['username']}'";
	$result = $conn->query($sql1);
	$row = $result->fetch_assoc();
	
	$id = $row['id'];
	$name = $_GET["player_name"];
	$date = $_GET["date"];
	$minutes = $_GET["minutes"];
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

	
	$sql = "INSERT INTO basketballPlayerGame (userkey, playername, date, minutes, points, rebounds, assists,
		steals, blocks, turnovers, fga, fgm, 3pa, 3pm, fta, ftm) 
		VALUES ('$id','$name','$date','$minutes','$points','$rebounds','$assists','$steals','$blocks',
		'$turnovers','$fga','$fgm','$threeattemps','$threemade','$fta','$ftm')";

	if ($conn->query($sql) === TRUE) {
    	  echo "New record created successfully";
	} else {
      	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn-> close();
?>