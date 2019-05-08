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
  <form action="insertBasketballTeam.php" method="get">
	Name: <input type = "text" name = "team_name"><br>
	City: <input type = "text" name = "city"><br>
	State: <input type = "text" name = "state"><br>
	<input type = "Submit" value = "Insert">
  </form>
</div>

<div id="newPlayer" class="tabcontent">
  <form action="insertBasketballPlayer.php" method="get">
	Name: <input type = "text" name = "player_name"><br>
	Number: <input type = "text" name = "number"><br>
	Position: <input type = "text" name = "position"><br>
	Height: <input type = "text" name = "height"><br>
	Weight: <input type = "text" name = "weight"><br>
	Team Name: <input type = "text" name = "team_name"><br>
	<input type = "Submit" value = "Insert">
  </form>
</div>

<div id="playerGame" class="tabcontent">
  <form action="insertBasketballPlayerGame.php" method="get">
	Player Name: <input type = "text" name = "player_name"><br>
	Date(YYYY-MM-DD): <input type = "text" name = "date"><br>
	Minutes Played: <input type = "text" name = "minutes"><br>
	Points: <input type = "text" name = "points"><br>
	Rebounds: <input type = "text" name = "rebounds"><br>
	Assists: <input type = "text" name = "assists"><br>
	Steals: <input type = "text" name = "steals"><br>
	Blocks: <input type = "text" name = "blocks"><br>
	Turnovers: <input type = "text" name = "turnovers"><br>
	FGA: <input type = "text" name = "fga"><br>
	FGM: <input type = "text" name = "fgm"><br>
	3PA: <input type = "text" name = "3pa"><br>
	3PM: <input type = "text" name = "3pm"><br>
	FTA: <input type = "text" name = "fta"><br>
	FTM: <input type = "text" name = "ftm"><br>
	<input type = "Submit" value = "Insert">
  </form>
</div>

<div id="teamGame" class="tabcontent">
  <form action="insertBasketballTeamGame.php" method="get">
	Team Name: <input type = "text" name = "team_name">
	Date(YYYY-MM-DD): <input type = "text" name = "date"><br>
	Location(Home/Away): <input type = "text" name = "location"><br>
 	Opponent Name: <input type = "text" name = "ateam_name">
	Result(W/L): <input type = "text" name = "result"><br>
	Points: <input type = "text" name = "points">
	Rebounds: <input type = "text" name = "rebounds">
	Assists: <input type = "text" name = "assists">
	Steals: <input type = "text" name = "steals">
	Blocks: <input type = "text" name = "blocks">
	Turnovers: <input type = "text" name = "turnovers">
	FGA: <input type = "text" name = "fga">
	FGM: <input type = "text" name = "fgm">
	3PA: <input type = "text" name = "3pa">
	3PM: <input type = "text" name = "3pm">
	FTA: <input type = "text" name = "fta">
	FTM: <input type = "text" name = "ftm">
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