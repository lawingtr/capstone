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
    <a class = "active" href = "newDatabase.php">New</a>
    <a href = "success.php">Account</a>
    <a href = "new.php">New</a>
    <div class="topnav-right">
	<a href="navigate.php">Navigate</a>
    </div>
</div>
<br>

<h1>Insert a new entry</h1>
<p>Use the tabs below to choose which type of entry you'd like to make.  Just fill in the relevant data and 
   click the "Insert" button below.</p>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'newTeam')">New Team</button>
  <button class="tablinks" onclick="openCity(event, 'newPlayer')">New Player</button>
  <button class="tablinks" onclick="openCity(event, 'playerGame')">Player Game</button>
  <button class="tablinks" onclick="openCity(event, 'teamGame')">Team Game</button>
</div>

<div id="newTeam" class="tabcontent">
  <form action="insertBaseballTeam.php" method="get">
	Name: <input type = "text" name = "team_name"><br>
	City: <input type = "text" name = "city"><br>
	State: <input type = "text" name = "state"><br>
	<input type = "Submit" value = "Insert">
  </form>
</div>

<div id="newPlayer" class="tabcontent">
  <form action="insertBaseballPlayer.php" method="get">
	First Name: <input type = "text" name = "firstname"><br>
	Last Name: <input type = "text" name = "lastname"><br>
	Number: <input type = "text" name = "number"><br>
	Position: <input type = "text" name = "position"><br>
	Height: <input type = "text" name = "height"><br>
	Weight: <input type = "text" name = "weight"><br>
	Team Name: <input type = "text" name = "team_name"><br>
	<input type = "Submit" value = "Insert">
  </form>
</div>

<div id="playerGame" class="tabcontent">
  <form action="insertBaseballPlayerGame.php" method="get">
	Player Last Name: <input type = "text" name = "player_name"><br>
	Date(YYYY-MM-DD): <input type = "text" name = "date"><br>
	AB: <input type = "text" name = "bats"><br>
	R: <input type = "text" name = "runs"><br>
	H: <input type = "text" name = "hits"><br>
	BB: <input type = "text" name = "bb"><br>
	RBI: <input type = "text" name = "rbi"><br>
	2B: <input type = "text" name = "2b"><br>
	3B: <input type = "text" name = "3b"><br>
	HR: <input type = "text" name = "hr"><br>
	K: <input type = "text" name = "k"><br>
	E: <input type = "text" name = "e"><br>
	<input type = "Submit" value = "Insert">
  </form>
</div>

<div id="teamGame" class="tabcontent">
  <form action="insertBaseballTeamGame.php" method="get">
	Team Name: <input type = "text" name = "team_name">
 	Opponent Name: <input type = "text" name = "ateam_name">
	Location(Home/Away): <input type = "text" name = "location"><br>
	Result(W/L): <input type = "text" name = "result"><br>
	Date(YYYY-MM-DD): <input type = "text" name = "date"><br>
	AB: <input type = "text" name = "ab">
	R: <input type = "text" name = "r">
	H: <input type = "text" name = "h">
	BB: <input type = "text" name = "bb">
	RBI: <input type = "text" name = "rbi">
	2B: <input type = "text" name = "2b">
	3B: <input type = "text" name = "3b">
	HR: <input type = "text" name = "hr">
	K: <input type = "text" name = "k">
	E: <input type = "text" name = "e">
	<input type = "Submit" value = "Insert">
  </form>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<div class = "topright">
      <?php  if (isset($_SESSION['username'])) : ?>
	<p><strong><?php echo $_SESSION['username']; ?></strong>
	   <a href="index.html" style="color: red;">logout</a> 
	</p>
    <?php endif ?>
</div>   
</body>   

</html>