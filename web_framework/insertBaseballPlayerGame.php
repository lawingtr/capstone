<?php
	session_start();
	$conn = new mysqli('localhost', 'lawingtr', '900599349', '4800-191-t3');
	$sql1 = "SELECT id FROM users WHERE username  = '{$_SESSION['username']}'";
	$result = $conn->query($sql1);
	$row = $result->fetch_assoc();
	
	$id = $row['id'];
	$name = $_GET["player_name"];
	$date = $_GET["date"];
	$bats = $_GET["bats"];
	$runs = $_GET["runs"];
	$hits = $_GET["hits"];
	$bb = $_GET["bb"];
	$rbi = $_GET["rbi"];
	$twob = $_GET["2b"];
	$threeb = $_GET["3b"];
	$hr = $_GET["hr"];
	$k = $_GET["k"];
	$e = $_GET["e"];

	
	$sql = "INSERT INTO baseballPlayerGame (userkey, playername, date, ab, r, h, bb,
		rbi, 2b, 3b, hr, k, e) 
		VALUES ('$id','$name','$date','$bats','$runs','$hits','$bb','$rbi',
		'$twob','$threeb','$hr','$k','$e')";

	if ($conn->query($sql) === TRUE) {
    	  echo "New record created successfully";
	} else {
      	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn-> close();
?>