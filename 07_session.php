<?php


session_start();

$_SESSION['isLoggedIn'] = true;
$_SESSION['username'] = "kaif";
$_SESSION['profile'] = "https://lh3.googleusercontent.com/ogw/AF2bZygMVIqFi083A3Cc0ioMhFMfBMLzour22FWvRhwE3w=s64-c-mo";

echo "User has been set";
?>