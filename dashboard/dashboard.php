<?php include "dashboardHeader.php" ?>
<?php include "../utils.php" ?>
<?php include "../alert.php" ?>
<?php
if (!isLoggedIn())
  redirect('/php_tutorial/admin-login.php');
$conn = connectToDB("phptutorialdb");
if (!$conn) {
  showErrorAlert("Something went wrong, Try after sometime");
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $sql = "DELETE FROM `content` WHERE `content`.`sno` = $id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    showSuccessAlert("Content Deleted successfully");
  } else {
    showErrorAlert("Something went wrong, Please try again !");
  }
}

$sql = "SELECT * FROM `content`";
$contents = mysqli_query($conn, $sql);

if (!$contents) {
  showErrorAlert("Something went wrong, Refresh the site");
}
?>

<main class="py-5 container">
  <h1 class="py-3">Dashboard</h1>
  <section>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button"
          role="tab" aria-controls="home-tab-pane" aria-selected="true">Web Content</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button"
          role="tab" aria-controls="profile-tab-pane" aria-selected="false">Create</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button"
          role="tab" aria-controls="contact-tab-pane" aria-selected="false">Admins</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="my-5">
          <?php

          while ($row = mysqli_fetch_assoc($contents)) {
            $heading = $row['heading'];
            $mainHeading = $row['mainHeading'];
            $desc = $row['description'];
            $note = $row['note'];
            $type = $row['types'];
            $methods = $row['methods'];
            $author = $row['author'];
            $example = $row['example'];
            $publish = $row['publish'] === "1" ? "Published" : "Not published";
            $time = $row['time'];
            $id = $row['sno'];
            echo "<div class='card custom-card my-3'>
                  <h5 id='headRef' class='card-header'>$heading</h5>
                      <div id='cardBody' class='card-body'>
                        <h5 class='card-title'>MainHeading : $mainHeading</h5>
                        <p class='card-text p-clamped-text'>Description : $desc</p>
                        <p class='card-text p-clamped-text'>Note : $note</p>
                        <p class='card-text p-clamped-text'>Type : $type</p>
                        <p class='card-text p-clamped-text'>Author : $author</p>
                        <p class='card-text p-clamped-text'>Methods :$methods </p>
                        <p class='card-text p-clamped-text'>Example :$example </p>
                        <p class='card-text'>Is Published : $publish</p>
                        <p class='card-text'>Created At : $time</p>
                        <form class='flex' id='deleteForm'>
                              <button id='$id' type='button' class='btn btn-info text-light editBtn'>Edit</button>
                              <button id='$id' type='button' class='btn btn-info text-light cardBtn'>Delete</button>
                        </form>
                      </div>
                </div>";
          }
          ?>
        </div>
      </div>
      <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <div class="container my-5">
          <?php include "form.php" ?>
        </div>
      </div>
      <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        <p class='py-5'> No Admin found</p>
      </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade modal-sm" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Content</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you confirm you want to delete this content ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="modalDeleteButton" type="button" class="btn btn-primary">Delete</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Edit Modal -->
    <div class="modal fade modal-xl" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Content</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body container">
          <?php include "modalForm.php" ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade modal-xl" id="descModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Content</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body container " id="desc-body">
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="./script.js"></script>

</main>

</body>

</html>