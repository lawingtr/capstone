<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.html");
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
    <a class = "active" href = "home.php">Home</a>
    <a href = "about.php">About</a>
    <a href = "newDatabase.php">New</a>
    <a href = "success.php">Account</a>
    <a href = "help.php">Help</a>
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

<br>
<div class="slideshow-container" align="center">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="analytics.jpg" style="width:50%">
  <div class="pictext">Gain an edge over your opponents with easy-to-use analytics tools!</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="football.jpg" style="width:50%">
  <div class="pictext">EZ Sports is suitable for every level of competition.  Whether you're a casual fan or a high school athlete, put your stats to work for you!</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="mysql.PNG" style="width:50%">
  <div class="pictext">Our services link to a remote SQL database.  No matter where you are, your data is always with you!</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<br>

<div class = "about">
    <h2>What is EZ Sports?</h2>
    <p>EZ Sports is a free, easy-to-use tool designed to help coaches, players, and fans of all 
	sports, at all levels.  At its core, the tool focuses on hosting custom databases created 
	by users that allow for easy tracking of physical, sport-specific, and analytical statistics 
	across a wide range of sports.
    </p>
    <h2>Why use this tool?</h2>
    <p>The major goal of EZ Sports centers ease-of-access regardless of technical experience or 
	level of competition.  From the middle school basketball coach, to the high school football 
	player's parent, to the casual AA baseball fan, tracking stats and data shouldn't be something that 
	takes away from the game, but something that improves it.
    </p>
    <h2>Where do I begin?</h2>
    <p>Begin by creating an account using the "Register" button at the top-right of your page.  If you 
	already have an account, log in and use the "New" tab to either create a database using one of 
	our pre-existing templates.</p>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 8000); // Change image every 2 seconds
}
</script>


</body>

<div class = "topright">
      <?php  if (isset($_SESSION['username'])) : ?>
	<p><strong><?php echo $_SESSION['username']; ?></strong>
	   <a href="index.html" style="color: red;">logout</a> 
	</p>
    <?php endif ?>
</div>   

</html>