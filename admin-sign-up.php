
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin SignUp | PHP Tutorial</title>
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

  $sql = "SELECT * FROM `admin`";
  $admin = mysqli_query($conn, $sql);

  if (mysqli_fetch_assoc($admin)) {
    redirect('/php_tutorial/admin-login.php');
  }

  $isLoggedIn = isLoggedIn();
  if ($isLoggedIn)
    header("Location :/php_tutorial/dashboard/dashboard.php");

  if ($_POST) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hash = trim(password_hash($password, PASSWORD_DEFAULT));

    $sql = "INSERT INTO `admin` 
    (`email`, `username`, `password`) 
    VALUES
    ('$email', '$username', '$hash '); 
    ";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
      showErrorAlert("Something went wrong, Try again !");
    } else {
      showSuccessAlert("Account created");
      $_SESSION['USERNAME'] = $user['username'];
      $_SESSION['ISLOGGEDIN'] = true;
      redirect('/php_tutorial/dashboard/dashboard.php');
    }
  }
  ?>
      <div class="my-5 container">
        <h1 class="text-xl text-center">Admin SignUp</h1>
      </div>


  <section class="vh-100 container">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-6 offset-xl-1 mx-auto">
          <form action="admin-sign-up.php" method="POST">
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Username</label>
              <input type="text" name="username" id="form3Example1" class="form-control form-control-lg text-white"
                placeholder="Enter a valid username" required min="3" />
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Email address</label>
              <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                placeholder="Enter a valid email address" required  />
            </div>
            <div class="form-outline mb-3">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                placeholder="Enter password" required min="8" />
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">SignUp</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/php_tutorial/admin-login.php"
                  class="link-danger">Login</a></p>
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