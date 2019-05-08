<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: community.html");
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
    <a href = "success.php">Account</a>
    <a class = "active" href = "help.php">Help</a>
    <div class="topnav-right">
	<a href="navigate.php">Navigate</a>
    </div>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    <!-- logged in user information -->
</div>

<table style="width:100%">
    <caption><h1>Helpful Terminology</h1></caption>
    <tr>
	<th>Keyword</th>
	<th>Description</th>
    </tr>
    <tr>
	<td>Data</td>
	<td>In a traditional setting, data can be defined as “facts and statistics collected together for 
		reference or analysis.”</td>
    </tr>
    <tr>
	<td>Sports Data</td>
	<td>Defines the statistics that are gathered as a result of sports competition</td>
    </tr>
    <tr>
	<td>Datasets</td>
	<td>A collection of individual types of data that is compiled into a single resource.  For example, 
		if there are two teams competing in a basketball game, statistics from the game, such as 
		points, rebounds, assists, steals, FG%, etc. can be gathered and analyzed, thus making up an 
		individual dataset</td>
    </tr>
    <tr>
	<td>Sports Analytics</td>
	<td>Defined as “collection of relevant, historical, statistics that when properly applied can provide 
		a competitive advantage to a team or individual.”</td>
    </tr>
    <tr>
	<td>Advanced Statistics</td>
	<td>Statistics born from sports analytics.  For example, effective field goal percentage, or eFG%, 
		is an advanced statistic that measures shooting efficiency, and places more emphasis on 
		the three-point shot.  It is widely used in the NBA today.</td>
    </tr>
</table>

<h1>FAQs</h1>


</body>

<div class = "topright">
      <?php  if (isset($_SESSION['username'])) : ?>
	<p><strong><?php echo $_SESSION['username']; ?></strong>
	   <a href="index.html" style="color: red;">logout</a> 
	</p>
    <?php endif ?>
</div>   

</html>