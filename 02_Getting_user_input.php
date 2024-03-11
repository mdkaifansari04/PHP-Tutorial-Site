<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <!-- <link rel="stylesheet" href="index.css"> -->
</head>
<body >
  <h1>Submit you information</h1>

  <hr>

  <form action="02_Getting_user_input.php" method="get">
  Name: <input type="text" name="username"><br><br>
  Age: <input type="text" name="age"><br><br>
  Branch: <input type="text" name="branch"><br><br>

  <input type="submit" value="Submit">
  </form>

  <?php
  echo "Your name is " . $_GET['username'] . "<br>";
  echo "Your age is" . $_GET['age'] . "<br>";
  echo "Your branch is " . $_GET['branch'] . "<br>";
  ?>
</body>
</html>