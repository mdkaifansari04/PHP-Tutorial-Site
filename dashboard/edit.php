<?php include "../utils.php" ?>
<?php include "../alert.php" ?>
<?php include "dashboardHeader.php" ?>
<?php
session_start();
$conn = connectToDB("phptutorialdb");
$user = $_SESSION['USERNAME'];

if (isset($_POST)) {
      $id = intval($_POST['id']);
      try {
            $sql = "SELECT * FROM `content` WHERE `author` = '$user'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                  echo "inside catch <br>";
                  echo "Publish " . $_POST['publish'] . " <br>";
                  $mainHeading = $_POST['mainHeading'];
                  $heading = $_POST['heading'];
                  $description = $_POST['description'];
                  $type = $_POST['type'];
                  $note = $_POST['note'];
                  $method = $_POST['method'];
                  $example = $_POST['example'];
                  $publish = $_POST['publish'] === "true" ? "1" : "0";
                  $sql = "UPDATE `content` SET `mainHeading` = ?, `heading` = ?,`publish` = ?, `description` = ?, `note` = ?, `types` = ?, `methods` = ?, `example` = ? WHERE `sno` = ?";
                  $statement = $conn->prepare($sql);

                  echo "publish " . $publish;
                  if (!$statement) {
                        die("Something went wrong, Refresh!" . $conn->error);
                  }

                  $statement->bind_param('ssssssssi', $mainHeading, $heading, $publish, $description, $note, $type, $method, $example, $id);

                  if ($statement->execute()) {
                        echo "Content Updated";
                  } else {
                        echo "Error: " . $statement->error;
                  }
                  $result = $statement->get_result();
                  if (!$result)
                        showErrorAlert("Server Error, Please try again");
                  else
                        showSuccessAlert("Content Updated");
                  $statement->close();
                  redirect('/php_tutorial/dashboard/dashboard.php');
            }
      } catch (\Throwable $th) {
            showErrorAlert($th->getMessage());
      }
}

?>