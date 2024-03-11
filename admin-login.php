
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | PHP Tutorial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css">
</head>
<body>

<div class="">

<?php include "utils.php" ?>
  <?php include "alert.php" ?>
  <?php
  $conn = connectToDB("phptutorialdb");

  if (!$conn)
    showErrorAlert("Internal server error !");


  $isLoggedIn = isLoggedIn();
  if ($isLoggedIn)
    redirect("/php_tutorial/dashboard/dashboard.php");

  if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE `email`=?";
    $statement = $conn->prepare($sql);
    if ($statement === false) {
      die("Error in preparing the statement: " . $conn->error);
    }

    $statement->bind_param('s', $email);
    $statement->execute();

    $result = $statement->get_result();
    if (!$result) {
      showErrorAlert("Wrong Credentials, Try again !");
    }

    $user = $result->fetch_assoc();
    if (!$user) {
      showErrorAlert("User not found. Wrong credentials, try again!");
    }
    if ($user) {
      echo "Check 1";
      echo var_dump($user);
      echo "<br>";

      echo '<br>';
      echo $password;
      if (password_verify(trim($password), $user['password'])) {
        showSuccessAlert("Logged In");
        $_SESSION['USERNAME'] = $user['username'];
        $_SESSION['ISLOGGEDIN'] = true;
        redirect("/php_tutorial/dashboard/dashboard.php");
      } else {
        showErrorAlert("Wrong credentials, try again!");
      }
    }
  }


  ?>
    <div class="my-5 container">
      <h1 class="text-xl text-center">Admin Login</h1>
    </div>


<section class="vh-100 container">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-6 offset-xl-1 mx-auto">
        <form action="admin-login.php" method="POST">
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Email address</label>
            <input type="email" id="form3Example3" name="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" required />
          </div>
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Password</label>
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" required />
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/php_tutorial/admin-sign-up.php"
                class="link-danger">Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>