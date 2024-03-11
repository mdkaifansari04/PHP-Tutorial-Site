<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | PHP Tutorial</title>
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">

</head>

<body>
  <?php

  if (isset($_POST['logout'])) {
    echo "running";
    header('Location: /php_tutorial/dashboard/logout.php');
    exit();
  }
  ?>
  <nav class="navbar navbar-expand-lg bg-dark text-light" data-bs-theme="dark">
    <div class="container-fluid bg-dark flex justify-between">
      <div class="bg-dark">
        <a class="navbar-brand bg-dark " href="/php_tutorial/01_php_intro.php">PHP <span class="text-info bg-dark">Tutorial</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse bg-dark" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item bg-dark">
            <a class="nav-link active bg-dark" aria-current="page"
              href="/php_tutorial/dashboard/dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item bg-dark">
            <a class="nav-link active bg-dark" aria-current="page"
              href="/php_tutorial/dashboard/concern.php">Concern</a>
          </li>
          <li class="nav-item bg-dark">
            <a class="nav-link active bg-dark" aria-current="page" href="/php_tutorial/01_php_intro.php">Visit Site</a>
          </li>
        </ul>

        <form action="dashboardHeader.php" method="POST" class="d-flex bg-dark" role="search">
          <input type="hidden" name="logout" value="true" />
          <button type="submit"
            class='c-pointer border border-2 border-info-subtle text-light bg-dark p-2 bg-dark rounded'>
            <svg class="bg-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
              color="#ffffff" fill="none">
              <path
                d="M15 17.625C14.9264 19.4769 13.3831 21.0494 11.3156 20.9988C10.8346 20.987 10.2401 20.8194 9.05112 20.484C6.18961 19.6768 3.70555 18.3203 3.10956 15.2815C3 14.723 3 14.0944 3 12.8373L3 11.1627C3 9.90561 3 9.27705 3.10956 8.71846C3.70555 5.67965 6.18961 4.32316 9.05112 3.51603C10.2401 3.18064 10.8346 3.01295 11.3156 3.00119C13.3831 2.95061 14.9264 4.52307 15 6.37501"
                stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" />
              <path d="M21 12H10M21 12C21 11.2998 19.0057 9.99153 18.5 9.5M21 12C21 12.7002 19.0057 14.0085 18.5 14.5"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </form>
      </div>
    </div>
  </nav>