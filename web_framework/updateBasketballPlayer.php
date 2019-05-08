<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: about.html");
  }
?>
<!DOCTYPE html>

<html lang="en">
<!-- Author: Thomas Lawing -->
<!-- Date:   2/11/19 -->


<html>

<head>
<h1>EZ Sports</h1>
<h5>Sports data tracking; made easy</h5>
<title>EZ Sports - Account</title>
<link rel="stylesheet" href="style.css" />
</head>

<body>
<div class = "topnav">
    <a href = "home.php">Home</a>
    <a href = "about.php">About</a>
    <a href = "newDatabase.php">New</a>
    <a class = "active" href = "success.php">Account</a>
    <a href = "help.php">Help</a>
    <div class="topnav-right">
	<a href="navigate.php">Navigate</a>
    </div>
</div>
<div class = "topright">
      <?php  if (isset($_SESSION['username'])) : ?>
	<p><strong><?php echo $_SESSION['username']; ?></strong>
	   <a href="index.html" style="color: red;">logout</a> 
	</p>
    <?php endif ?>
</div>   

<h1>Welcome to your account page!</h1>
<p>This is where you can view/edit the databases that you've already created.  If you're looking to create 
   a new database, press the "New" tab at the top of the page.</p>
<br>

<?php
session_start();
$con = mysqli_connect('localhost', 'lawingtr', '900599349', '4800-191-t3');
if (!$con) {
die("Can't connect: " . mysqli_errror());
}
$sql1 = "SELECT id FROM users WHERE username  = '{$_SESSION['username']}'";
$result1 = $con->query($sql1);
$row = $result1->fetch_assoc();
$id = $row['id'];

if(isset($_POST['update'])) {
$UpdateQuery = "UPDATE basketballPlayer SET `firstname`='$_POST[Firstname]', `lastname`='$_POST[Lastname]', `number`='$_POST[Number]', `position`='$_POST[Position]', 
		`height`='$_POST[Height]', `weight`='$_POST[Weight]', `team`='$_POST[Team]' WHERE `id`='$_POST[hidden]'";
if ($con->query($UpdateQuery) === TRUE) {
echo "";
} else {
echo "Error updating record: " . $con->error;
}
};

if(isset($_POST['delete'])) {
$DeleteQuery = "DELETE FROM basketballPlayer WHERE `id`='$_POST[hidden]'";
if ($con->query($DeleteQuery) === TRUE) {
echo "";
} else {
echo "Error updating record: " . $con->error;
}
};

if(isset($_POST['add'])) {
$AddQuery = "INSERT INTO basketballPlayer (firstname, lastname, number, position, height, weight, team, userkey) VALUES 
	     ('$_POST[ufirstname]', '$_POST[ulastname]', '$_POST[unumber]', '$_POST[uposition]', '$_POST[uheight]', 
	     '$_POST[uweight]', '$_POST[uteam]', '$id')";
if ($con->query($AddQuery) === TRUE) {
echo "";
} else {
echo "Error updating record: " . $con->error;
}
};



$sql = "SELECT * from basketballPlayer WHERE userkey = '$id'";
$result = $con->query($sql);
echo "<table border=1>
	<tr>
	  <th>First Name</th>
	  <th>Last Name</th>
	  <th>Player #</th>
	  <th>Position</th>
	  <th>Height</th>
	  <th>Weight</th>
	  <th>Team</th>
	</tr>";
while($record = mysqli_fetch_array($result)){
echo "<form action=updatePlayer.php method=post>";
echo "<tr>";
echo "<td>" . "<input type=text name=Firstname value=" . $record['firstname'] . " </td>";
echo "<td>" . "<input type=text name=Lastname value=" . $record['lastname'] . " </td>";
echo "<td>" . "<input type=text name=Number value=" . $record['number'] . " </td>";
echo "<td>" . "<input type=text name=Position value=" . $record['position'] . " </td>";
echo "<td>" . "<input type=text name=Height value=" . $record['height'] . " </td>";
echo "<td>" . "<input type=text name=Weight value=" . $record['weight'] . " </td>";
echo "<td>" . "<input type=text name=Team value=" . $record['team'] . " </td>";
echo "<td>" . "<input type=hidden name=hidden value=" . $record['id'] . " </td>";
echo "<td>" . "<input type=submit name=update value=Update" . " </td>";
echo "<td>" . "<input type=submit name=delete value=Delete" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "<form action=updatePlayer.php method=post>";
echo "<tr>";
echo "<td><input type=text name=ufirstname></td>";
echo "<td><input type=text name=ulastname></td>";
echo "<td><input type=text name=unumber></td>";
echo "<td><input type=text name=uposition></td>";
echo "<td><input type=text name=uheight></td>";
echo "<td><input type=text name=uweight></td>";
echo "<td><input type=text name=uteam></td>";
echo "<td>" . "<input type=submit name=add value=Add" . " </td>";
echo "</tr>";
echo "</form>";
echo "</table>";

mysqli_close($con);

?>

<p>To return to the sortable read-only format, click the button below or select "Data Overview" from the navbar.</p>
<div class="btn-d">
    <a href="accountBasketball.php">Return</a>
</div>


</body>
 

</html>