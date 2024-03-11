
  <?php include "navbar.php" ?>
  <?php include "utils.php" ?>
  <?php
  $showAlert = false;


  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "phptutorialdb";


  $conn = mysqli_connect($server, $username, $password, $database);

  if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    insertContactDetails($name, $email, $message);
  }
  ?>  
  <main class="dark container my-5">
    <div class="">

      <h1 class="my-5">Contact us for more concern</h1>
    </div>
  <form method="POST" action= "05_inserting_data.php">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" min ="3" required id="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required min="3">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3 d-flex flex-column">
    <label for="message" class="form-label">Your recommendation</label>
    <textarea required id="message" min="5" class="form-control text-light" name="message" id="" cols="60" rows="5"></textarea>
  </div>
  <button type="submit" class="btn btn-info text-white">Submit</button>
    </form>
  </main>


  <?php include 'footer.php' ?>