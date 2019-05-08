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
$UpdateQuery = "UPDATE basketballTeamGame SET `teamname`='$_POST[Playername]', `date`='$_POST[Date]', `opponentname`='$_POST[Opponentname]', `location`='$_POST[Location]', `result`='$_POST[Result]', `points`='$_POST[Points]', `rebounds`='$_POST[Rebounds]', 
		`assists`='$_POST[Assists]', `steals`='$_POST[Steals]', `blocks`='$_POST[Blocks]', `turnovers`='$_POST[Turnovers]', `fga`='$_POST[Fga]', 
		`fgm`='$_POST[Fgm]', `3pa`='$_POST[Threepa]', `3pm`='$_POST[Threepm]', `fta`='$_POST[Fta]', `ftm`='$_POST[Ftm]' WHERE `id`='$_POST[hidden]'";
if ($con->query($UpdateQuery) === TRUE) {
echo "";
} else {
echo "Error updating record: " . $con->error;
}
};

if(isset($_POST['delete'])) {
$DeleteQuery = "DELETE FROM basketballTeamGame WHERE `id`='$_POST[hidden]'";
if ($con->query($DeleteQuery) === TRUE) {
echo "";
} else {
echo "Error updating record: " . $con->error;
}
};

if(isset($_POST['add'])) {
$AddQuery = "INSERT INTO basketballTeamGame (teamname, date, opponentname, location, result, points, rebounds, assists, steals, blocks, turnovers, fga, fgm, 3pa, 3pm, fta, ftm, userkey) VALUES 
	     ('$_POST[uplayername]', '$_POST[udate]', '$_POST[uopponentname]', '$_POST[ulocation]', '$_POST[uresult]', '$_POST[upoints]', '$_POST[urebounds]', '$_POST[uassists]', 
	     '$_POST[usteals]', '$_POST[ublocks]', '$_POST[uturnovers]', '$_POST[ufga]', '$_POST[ufgm]', '$_POST[u3pa]', '$_POST[u3pm]', '$_POST[ufta]', '$_POST[uftm]', '$id')";
if ($con->query($AddQuery) === TRUE) {
echo "";
} else {
echo "Error updating record: " . $con->error;
}
};



$sql = "SELECT * from basketballTeamGame WHERE userkey = '$id'";
$result = $con->query($sql);
echo "<table border=1>
	<tr>
	  <th>Team Name</th>
	  <th>Date</th>
	  <th>Opponent Name</th>
	  <th>Location</th>
	  <th>Result</th>
	  <th>Points</th>
	  <th>Rebounds</th>
	  <th>Assists</th>
	  <th>Steals</th>
	  <th>Blocks</th>
	  <th>Turnovers</th>
	  <th>FGA</th>
	  <th>FGM</th>
	  <th>3PA</th>
	  <th>3PM</th>
	  <th>FTA</th>
	  <th>FTM</th>
	</tr>";
while($record = mysqli_fetch_array($result)){
echo "<form action=updateBasketballTeamGame.php method=post>";
echo "<tr>";
echo "<td>" . "<input type=text name=Playername value=" . $record['teamname'] . " </td>";
echo "<td>" . "<input type=text name=Date value=" . $record['date'] . " </td>";
echo "<td>" . "<input type=text name=OpponentName value=" . $record['opponentname'] . " </td>";
echo "<td>" . "<input type=text name=Location value=" . $record['location'] . " </td>";
echo "<td>" . "<input type=text name=Result value=" . $record['result'] . " </td>";
echo "<td>" . "<input type=text name=Points value=" . $record['points'] . " </td>";
echo "<td>" . "<input type=text name=Rebounds value=" . $record['rebounds'] . " </td>";
echo "<td>" . "<input type=text name=Assists value=" . $record['assists'] . " </td>";
echo "<td>" . "<input type=text name=Steals value=" . $record['steals'] . " </td>";
echo "<td>" . "<input type=text name=Blocks value=" . $record['blocks'] . " </td>";
echo "<td>" . "<input type=text name=Turnovers value=" . $record['turnovers'] . " </td>";
echo "<td>" . "<input type=text name=Fga value=" . $record['fga'] . " </td>";
echo "<td>" . "<input type=text name=Fgm value=" . $record['fgm'] . " </td>";
echo "<td>" . "<input type=text name=Threepa value=" . $record['3pa'] . " </td>";
echo "<td>" . "<input type=text name=Threepm value=" . $record['3pm'] . " </td>";
echo "<td>" . "<input type=text name=Fta value=" . $record['fta'] . " </td>";
echo "<td>" . "<input type=text name=Ftm value=" . $record['ftm'] . " </td>";
echo "<td>" . "<input type=hidden name=hidden value=" . $record['id'] . " </td>";
echo "<td>" . "<input type=submit name=update value=Update" . " </td>";
echo "<td>" . "<input type=submit name=delete value=Delete" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "<form action=updateBasketballTeamGame.php method=post>";
echo "<tr>";
echo "<td><input type=text name=uplayername></td>";
echo "<td><input type=text name=udate></td>";
echo "<td><input type=text name=uopponentname></td>";
echo "<td><input type=text name=ulocation></td>";
echo "<td><input type=text name=uresult></td>";
echo "<td><input type=text name=upoints></td>";
echo "<td><input type=text name=urebounds></td>";
echo "<td><input type=text name=uassists></td>";
echo "<td><input type=text name=usteals></td>";
echo "<td><input type=text name=ublocks></td>";
echo "<td><input type=text name=uturnovers></td>";
echo "<td><input type=text name=ufga></td>";
echo "<td><input type=text name=ufgm></td>";
echo "<td><input type=text name=u3pa></td>";
echo "<td><input type=text name=u3pm></td>";
echo "<td><input type=text name=ufta></td>";
echo "<td><input type=text name=uftm></td>";
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