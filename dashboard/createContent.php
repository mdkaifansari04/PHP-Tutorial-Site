<?php include "../utils.php" ?>
<?php include "../alert.php" ?>

<?php
session_start();
$conn = connectToDB('phptutorialdb');
if (!$conn)
      showErrorAlert("Something went wrong, Try again !");

if ($_POST) {
      $mainHeading = $_POST['mainHeading'];
      $heading = $_POST['heading'];
      $description = $_POST['description'];
      $type = $_POST['type'];
      $note = $_POST['note'];
      $method = $_POST['method'];
      $example = $_POST['example'];
      $publish = $_POST['publish'] === "true" ? "1" : "0";
      $author = $_SESSION['USERNAME'];

      $sql = "INSERT INTO `content` (`mainHeading`, `heading`, `description`, `note`, `types`, `methods`,`author`, `publish`,`example`)
            VALUES 
            ('$mainHeading', '$heading', '$description', '$note', '$type', '$method','$author', '$publish', '$example');";

      $result = mysqli_query($conn, $sql);

      if (!$result) {
            showErrorAlert("Server Error, Please try again");
            redirect('/php_tutorial/dashboard/dashboard.php');
      } else {
            showSuccessAlert("Content Updated");
            redirect('/php_tutorial/dashboard/dashboard.php');
      }
}

?>