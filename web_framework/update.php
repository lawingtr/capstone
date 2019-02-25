<html>
<body>

<form action="update.php" method="get">
Name: <input type="text" name="name">
<input type="Submit" value="Search">
</form>

<?php 
      	include("connection.php");
      
	$searchkey = $_GET["name"];

	$sql = "SELECT * FROM Players where name='".$searchkey."'";
	$result = $mysqli_conn->query($sql);

	if ($result->num_rows > 0) {
	    
	    $row = $result->fetch_assoc();
	   
	    $name = $row["name"];
	    $team = $row["team"];
	}
	
	$mysqli_conn->close();
?> 

<form action="update_action.php" method="get">
Name: <input type="text" name="name" value="<?php echo $name ?>"><br>
Team: <input type="text" name="team" value="<?php echo $team ?>">
<input type="Submit" value="Update">
</form>


</body>
</html>
