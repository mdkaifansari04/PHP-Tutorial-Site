<?php

$server = "localhost";
$username = "root";
$password = "";

// connection 
$conn = mysqli_connect($server, $username, $password);

if (mysqli_connect_error()) {
  echo "Unable to connect to the database";
} else {
  echo "Connected to the database<br>";
}


// creating database


$sql = "CREATE DATABASE DEMO4";
$result = mysqli_query($conn, $sql);


if (!$result) {
  echo "Unable to run the query, error :" . mysqli_error($conn) . "<br>";
} else {
  echo "Database created ! <br>";
}

?>