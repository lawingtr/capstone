<?php
$servername = "localhost";
$username = "lawingtr";
$password = "900599349";
$dbname = "lawingtr";

//Create connection
$mysqli_conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($mysqli_conn->connect_error) {
    die("Connection failed: " . $mysqli_conn->connect_error);
}
