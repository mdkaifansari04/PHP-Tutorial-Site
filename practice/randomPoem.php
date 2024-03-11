<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Random Poem</title>
</head>
<body>
  <h1>Create you own poem</h1>

  <hr>

  <form action="randomPoem.php" method="get">
    Color: <input type="text" name="color">
    Flower: <input type="text" name="flower">
    Celebrity Name : <input type="text" name="actor">
    <input type="submit" >
  </form>

  <?php
  if ($_GET) {
    echo "Roses are {$_GET['color']}" . "<br>";
    echo "{$_GET['flower']} are blue" . "<br>";
    echo "Oh ! my {$_GET['actor']}" . "<br>";
    echo "I love you !";
  }
  ?>
</body>
</html>