<?php
function showErrorAlert($message): void
{
  echo "<div class='alert alert-danger alert-dismissible fade show text-white' role='alert'>
  <strong>Error !</strong>" . ($message ? $message : "Something went wrong, Try again !") .
    "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}

function showSuccessAlert($message): void
{
  echo "<div class='alert alert-success alert-dismissible fade show text-white' role='alert'>
  <strong>Successfully !</strong>" . ($message ? $message : "Operation completed!") .
    "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}

?>