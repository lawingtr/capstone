<?php
	session_start();
	$conn = new mysqli('localhost', 'lawingtr', '900599349', '4800-191-t3');
	$sql1 = "SELECT id FROM users WHERE username  = '{$_SESSION['username']}'";
	$result = $conn->query($sql1);
	$row = $result->fetch_assoc();
	
	$id = $row['id'];
	$name = $_GET["player_name"];
	$number = $_GET["number"];
	$position = $_GET["position"];
	$height = $_GET["height"];
	$weight = $_GET["weight"];
	$team = $_GET["team_name"];
	
	$sql = "INSERT INTO basketballPlayer (userkey, name, number, position, height, weight, team) 
		VALUES ('$id','$name','$number','$position','$height','$weight','$team')";

	if ($conn->query($sql) === TRUE) {
    	  echo "New record created successfully";
	} else {
      	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>