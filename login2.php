<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/style.css">
  <title>WeBooks</title>
</head>

<body class="d-flex flex-column h-100">
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="./login2.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
        <span class="fs-4 serif-font text-white"><span class="webooks-text-yellow">WE</span>BOOKS</span>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="./login2.php" class="nav-link px-2 header-link-secondary">Home</a></li>
        <li><a href="./list_books.php" class="nav-link px-2 header-link">Library</a></li>
        <li><a href="./owned_books.php" class="nav-link px-2 header-link">Your Books</a></li>
      </ul>

      <?php
      include './includes/config.php';
      $sql_header = "SELECT * FROM t_user WHERE user_id = '$_SESSION[user_id]'";
      $result_header = mysqli_query($conn, $sql_header) or die(mysqli_error($conn));
      $row_header = mysqli_fetch_assoc($result_header);
      ?>

      <ul class="navbar-nav col-md-3 text-end">
        <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $row_header['first_name'] . " " . $row_header['last_name']; ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="./user_profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="#">History</a></li>
            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>

    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="./assets/images/books.png" class="d-block mx-lg-auto img-fluid" alt="Picture of Books" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-1 serif-font text-white text-body-emphasis lh-1 mb-2"><span class="webooks-text-yellow">WE</span>BOOKS</h1>
          <p class="lead">All the books at the tip of your fingers.</p>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer mt-auto pt-3">
    <div class="container">
      <p class="text-center text-body-secondary border-top py-3 m-0">© João Martins. All Rights Reserved</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>