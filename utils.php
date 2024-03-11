
<?php
function createDB()
{
  echo "working";
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "contactDB";


  $conn = mysqli_connect($server, $username, $password, $database);

  $create_db_query = "CREATE DATABASE contactDB";
  $result = mysqli_query($conn, $create_db_query);
  if ($result) {
    $showAlert = true;
    $alertType = "success";
    $title = "Successfully";
    $message = "Created the database";
  }
}

function connectToDB($dbname)
{
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = $dbname;
  $conn = new mysqli($server, $username, $password, $database);
  if (!$conn)
    return false;
  return $conn;
}

function insertContactDetails($name, $email, $concern)
{
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "phptutorialdb";
  $result = false;
  $conn = mysqli_connect($server, $username, $password, $database);
  $sql = "INSERT INTO `feedback` 
    (`name`, `email`, `concern`)
    VALUES 
    ('$name', '$email', '$concern');
    ";

  $result = mysqli_query($conn, $sql);
  if ($result == true) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success !</strong> Your feedback has been submitted.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
  } else {
    echo "<div class='alert alert-danger alert-dismissible fade show text-white' role='alert'>
    <strong>Error !</strong> Something went wrong, Try again !
    <button type='button' class='btn-close bg-success' data-bs-dismiss='alert' aria-label='Close'>X</button>
  </div>";
  }
}

function redirect($url)
{
  header('Location: ' . $url);
  exit();
}

function getAllFeedback()
{
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "contactdb";

  $conn = new mysqli($server, $username, $password, $database);
  if (!$conn)
    return null;

  $sql = "SELECT * FROM `feedback`";
  $feedback = mysqli_query($conn, $sql);

  if ($feedback == true)
    return $feedback;
  else
    return null;

}

function isLoggedIn()
{
  session_start();
  if (isset($_SESSION['ISLOGGEDIN'])) {
    return true;
  } else {
    return false;
  }
}

?>