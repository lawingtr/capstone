<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: navigate.html");
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
    <a href = "help.php">Help</a>
    <div class="topnav-right">
	<a class = "active" href="navigate.php">Navigate</a>
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

<table style="width:100%">
    <caption><h1>Complete Sitemap</h1></caption>
    <tr>
	<th>Page Name</th>
	<th>Description</th>
    </tr>
    <tr>
	<td><a href="home.php">Home</a></td>
	<td>The home page contains bits of information regarding the purpose of this site, and helpful tips for beginners.</td>
    </tr>
    <tr>
	<td><a href="about.php">About</a></td>
	<td>The about page goes into detail defining the purpose behind EZ Sports, what the project offers compared to other tools, how it was created, and external resources.</td>
    </tr>
    <tr>
	<td><a href="newDatabase.php">New</a></td>
	<td>The new page is where users go to create new databases.  If you aren't logged in, this page won't have much to offer.</td>
    </tr>
    <tr>
	<td><a href="success.php">Account</a></td>
	<td>The account page displays user credentials and prints a reactive list of databases owned by that user.  This page also doesn't offer much to someone who isn't logged in.</td>
    </tr>
    <tr>
	<td><a href="help.php">Help</a></td>
	<td>The help page offers a FAQ section with answers, as well as a way to contact the site administrators and a helpful glossary of sports analytics terminology.</td>
    </tr>
    <tr>
	<td><a href="navigate.php">Navigate</a></td>
	<td>The navigate page displays a navigable list of pages with brief descriptions of each page's intended purpose.</td>
    </tr>
    <tr>
	<td><a href="register.php">Register</a></td>
	<td>The register page allows you to register as a new user on the site.</td>
    </tr>
    <tr>
	<td><a href="login.php">Login</a></td>
	<td>The login page allows you to log into an existing account.</td>
    </tr>
</table>


</body>

<div class = "topright">
      <?php  if (isset($_SESSION['username'])) : ?>
	<p><strong><?php echo $_SESSION['username']; ?></strong>
    	   <a href="navigate.html?logout='1'" style="color: red;">logout</a> 
	</p>
    <?php endif ?>
</div>
 

</html>