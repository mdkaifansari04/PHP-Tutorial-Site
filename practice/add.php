<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Addition</title>
</head>
<body>
  <h1>Add your penny</h1>
  <hr>

  <form action="add.php" method="get">
    Num1 :<input type="number" name="num1" ><br><br>
    Num2 :<input type="number" name="num2" ><br><br>
    <input type="submit" value="Add" ><br><br>

    Answer: 
    <?php
    if ($_GET) {
      echo $_GET['num1'] + $_GET['num2'];
    }
    ?>
  </form>
</body>
</html>