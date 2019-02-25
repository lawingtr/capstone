<html>
<body>

<?php 
      	include("connection.php");
      
	$sort = $_GET["sort"];

	$sql = "SELECT * FROM Players order by ".$sort;
	$result = $mysqli_conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "Name: " . $row["name"]. " team: " . $row["team"]."<br>";
	    }
	}
	
	$mysqli_conn->close();
?> 

Sort by: <a href="sort.php?sort=name">Names</a> OR <a href="sort.php?sort=team">Teams</a>

</body>
</html>
