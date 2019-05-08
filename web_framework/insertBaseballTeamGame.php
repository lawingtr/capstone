<?php
	session_start();
	$conn = new mysqli('localhost', 'lawingtr', '900599349', '4800-191-t3');
	$sql1 = "SELECT id FROM users WHERE username  = '{$_SESSION['username']}'";
	$result = $conn->query($sql1);
	$row = $result->fetch_assoc();
	
	$id = $row['id'];
	$name = $_GET["team_name"];
	$opponentname = $_GET["ateam_name"];
	$location = $_GET["location"];
	$result = $_GET["result"];
	$date = $_GET["date"];
	$ab = $_GET["ab"];
	$r = $_GET["r"];
	$h = $_GET["h"];
	$bb = $_GET["bb"];
	$rbi = $_GET["rbi"];
	$twob = $_GET["2b"];
	$threeb = $_GET["3b"];
	$hr = $_GET["hr"];
	$k = $_GET["k"];
	$e = $_GET["e"];

	
	$sql = "INSERT INTO baseballTeamGame (userkey, teamname, opponentname, location, result, date,
		ab, r, h, bb, rbi, 2b, 3b, hr, k, e) 
		VALUES ('$id','$name','$opponentname','$location','$result','$date','$ab','$r',
		'$h','$bb','$rbi','$twob','$threeb','$hr','$k','$e')";

	if ($conn->query($sql) === TRUE) {
    	  echo "New record created successfully";
	} else {
      	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>