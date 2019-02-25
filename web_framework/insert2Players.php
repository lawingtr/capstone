<html>
<body>

<?php 
      	include("connection.php");
      
	$name = $_GET["name"];
	$team = $_GET["team"];

	$sql = "INSERT INTO Players values ('".$name."',".$team.")";

	if ($mysqli_conn->query($sql) === TRUE) {
    		echo "New record created successfully";
	} else if ($name || $team) {
	    echo "Error: " . $sql . "<br>" . $mysqli_conn->error;
	}
	
	$mysqli_conn->close();
?> 

<br>
Sort by: <a href="sort.php?sort=name">Names</a> OR <a href="sort.php?sort=team">Team</a>

</body>
</html>
