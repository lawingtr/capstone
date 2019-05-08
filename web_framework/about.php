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
    <a class = "active" href = "about.php">About</a>
    <a href = "newDatabase.php">New</a>
    <a href = "success.php">Account</a>
    <a href = "help.php">Help</a>
    <div class="topnav-right">
	<a href="navigate.php">Navigate</a>
    </div>
</div>

<div class="about">
<h1>What is this tool?</h1>
<p>The overarching objective of this website is two-fold; to combine my passion for 
computer science into a sports tool that is both useful and practical, and to learn as much as 
possible about web development, SQL, PHP, and how these things can interconnect to create a website worth 
sharing.  While there are database resources available to anyone, my project aims to target a 
specific demographic and tailor its services accordingly.  Data, or “analytics”, as it pertains to sports, 
is widely viewed as the future of competition.  In the last 5 years, every major sport in North America 
has experienced an influx of analytical techniques that are meant to help understand the results 
of competition in new ways, to further build on potential advantages.  My project aims to give everyone, 
regardless of level of competition, access to these same analytical techniques, by allowing them 
to store and manipulate their data quickly and efficiently.  This project is built from scratch, 
using MySQL workbench, HTML files, PHP files, and CSS files.  The original objective was to allow users 
to create custom databases for one of 3 different sports (baseball, football, basketball), 
and that’s what I’ve been able to accomplish.  My project offers an easy-to-navigate web-based 
format, unique login system, and, of course, the ability to create multiple databases for any of the three 
sports previously mentioned.</p>

<h1>What do you mean by "Data"?</h1>
<p>“Data”, in a traditional setting, can be defined as “facts and statistics collected together for reference 
or analysis.”   In other words, data defines anything that can be quantified and analyzed.  Data can come from 
one of an infinite number of sources, and can be stored manually, electronically, or mentally.  For the purposes 
of this report, “data” will, unless otherwise noted, be referred to in the context of sports.  “Sports data” 
defines the statistics that are gathered as a result of sports competition.  For example, if there are two 
teams competing in a basketball game, statistics from the game, such as points, rebounds, assists, steals, FG%, 
etc. can be gathered and analyzed, thus making up an individual dataset.  These sports datasets can be created 
focusing on a single player’s statistics, or the entirety of a competitive sports league.  The scope and size of 
a dataset is ultimately up to the discretion of the analyst, who decides what to record and what to ignore.</p>

<h1>Does "sports data" actually give an advantage?</h1>
<p>Without question.  Let's look at the NBA, for example.  Effective field goal percentage, or eFG%, is an 
advanced statistic that measures shooting efficiency, and places more emphasis on the three-point shot.  
The Golden State Warriors, who have won the last two NBA Championships, and are the overwhelming favorite to win 
a third, have led the league in eFG% each of the last three regular seasons.   While no one would claim this is 
the only reason for the Warriors’ recent success, everyone agrees that it isn’t simply coincidence.  These 
advanced statistics are a recent development in North American sports, with the MLB being the first of the major 
sports leagues to adopt and build around analytics and advanced statistics.  As I described earlier, the 
NBA has recently seen a massive shift in style-of-play because of these statistics, and the NFL is moving 
toward analytics as well.</p>
</div>

<div class = "topright">
      <?php  if (isset($_SESSION['username'])) : ?>
	<p><strong><?php echo $_SESSION['username']; ?></strong>
	   <a href="index.html" style="color: red;">logout</a> 
	</p>
    <?php endif ?>
</div>   
</body>
 

</html>