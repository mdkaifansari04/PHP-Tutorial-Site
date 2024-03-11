<?php include "dashboardHeader.php" ?>
<?php include "../utils.php" ?>
<?php include "../alert.php" ?>
<?php
if (!isLoggedIn())
  redirect('/php_tutorial/admin-login.php');
?>
<?php
$conn = connectToDB("phptutorialdb");
if (!$conn)
  showErrorAlert("Database connection issue");
$feedback = mysqli_query($conn, "SELECT * FROM `feedback`");

if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $sql = "DELETE FROM `feedback` WHERE `srno` = $sno";

  $result = mysqli_query($conn, $sql);
  if (!$result)
    showErrorAlert("Unable to delete the record");
  else
    showSuccessAlert("Record deleted successfully");
  header('Location: /php_tutorial/dashboard/concern.php');
}
?>

<main class="container my-5 mb-3">
  <div class="container overflow-hidden">
    <h1>Concern List</h1>
  </div>
  <div class="my-2 ">
    <table class="table my-5" id="myTable">
      <thead class="bg-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Message</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($feedback)) {
          echo "<tr>";
          echo "<th scope='row'>$no</th>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td class='sm-clamp c-pointer modalBtn'>" . $row['concern'] . "</td>";
          echo "<td><div class='d-flex gap-2'><a href='mailto:" . $row['email'] . "'><ion-icon class='p-2 bg-light c-pointer rounded-circle text-dark'  name='arrow-redo-outline'></ion-icon></a> <ion-icon id='" . $row['srno'] . "' class='p-2 c-pointer bg-light deleteBtn  rounded-circle text-dark'  name='trash-outline'></ion-icon></div></td>'";
          echo "</tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
      <div class="modal-dialog bg-dark">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div id="modalMessage" class="modal-body">

          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
  integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script>
  let table = new DataTable('#myTable');
</script>
<script src="../index.js"></script>
</body>

</html>