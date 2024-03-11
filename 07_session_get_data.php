<?php
session_start();
if (!isset($_SESSION["isLoggedIn"])) {
  echo "Please login";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Session</title>
</head>
<body>
  <h1>Welcome</h1>

  <h3><?php echo $_SESSION['username'] . "<br>"; ?></h3>
  <?php
  echo "<img src='" . $_SESSION['profile'] . "'>";
  ?>
</body>
</html>