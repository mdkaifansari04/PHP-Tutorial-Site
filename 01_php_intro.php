<?php include "navbar.php" ?>
<?php include "utils.php" ?>
<?php include "alert.php" ?>

<?php
$conn = connectToDB('phptutorialdb');
if (!$conn)
  showErrorAlert("Something went wrong, Try again !");


$sql = "SELECT * FROM `content`";
$result = mysqli_query($conn, $sql);

if (!$result)
  showErrorAlert("Server error, Refresh the site");
?>

<main class="dark">
  <div class="container my-5">
    <h1 class="main-heading">
      Learn PHP with ease !
    </h1>

    <?php
    $count = 1;
    while ($row = mysqli_fetch_assoc($result)) {

      if ($row['publish'] === '0')
        continue;

      $heading = $row['heading'];
      $mainHeading = $row['mainHeading'];
      $description = explode(";", $row['description']);
      $note = $row['note'];
      $example = $row['example'];
      $types = explode(';', $row['types']);
      $methods = explode(';', $row['methods']);
      echo "<div class='my-5 container'>";
      // Single data
      echo "<h2>$count. $heading</h2>";
      if (count($description) > 0) {
        for ($i = 0; $i < count($description); $i++) {
          echo "<p>" . $description[$i] . "</p>";
        }
      }

      if (count($types) - 1 > 0) {
        echo "<div class='my-5 container'>
        <h3>Types</h3>
        <ul>";

        for ($i = 0; $i < count($types) - 1; $i++) {
          echo "<li>" . $types[$i] . "</li>";
        }
        echo "</ul></div>";
      }
      if ($methods && count($methods) - 1 > 0) {
        echo "<div class='my-5 container'>
        <h3>Methods</h3>
        <ol>";
        for ($i = 0; $i < count($methods) - 1; $i++) {
          echo "<li>" . $methods[$i] . "</li>";
        }
      }
      echo "</ol></div>";

      if ($note) {
        echo "<div class='p-3 text-primary-emphasis container bg-primary-subtle border border-info border-5 border-bottom-0 border-top-0 border-end-0 rounded-0 d-flex flex-wrap'>
        <strong class='bg-primary-subtle text-dark bold'>Note :</strong> <p class='bg-primary-subtle text-dark'>$note</p>
      </div>";
      }

      if ($example) {
        echo "<div class='my-5 container'><h3 class='my-2'>Example</h3><pre class='language-php bg-dark py-2 px-4 border border-info border-5 border-bottom-0 border-top-0 border-end-0'>$example</pre></div>";
      }

      echo "</div>";
      $count = $count + 1;
    }
    ?>
  </div>
</main>

<script src="path/to/code-highlighting-library.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>