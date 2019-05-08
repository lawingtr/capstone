<?php
	session_start();
	$conn = new mysqli('localhost', 'lawingtr', '900599349', '4800-191-t3');
	$sql1 = "SELECT id FROM users WHERE username  = '{$_SESSION['username']}'";
	$result = $conn->query($sql1);
	$row = $result->fetch_assoc();
	
	$id = $row['id'];
	$name = $_GET["team_name"];
	$city = $_GET["city"];
	$state = $_GET["state"];
	
	$sql = "INSERT INTO baseballTeam (userkey, teamname, city, state) 
		VALUES ('$id','$name','$city', '$state')";

	if ($conn->query($sql) === TRUE) {
    	  echo "New record created successfully";
	} else {
      	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>