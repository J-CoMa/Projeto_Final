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
  <title>WeBooks - User Profile</title>
</head>

<body class="d-flex flex-column h-100">
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="./login2.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
        <span class="fs-4 serif-font text-white"><span class="webooks-text-yellow">WE</span>BOOKS</span>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="./login2.php" class="nav-link px-2 header-link">Home</a></li>
        <li><a href="./list_books.php" class="nav-link px-2 header-link">Library</a></li>
        <li><a href="./owned_books.php" class="nav-link px-2 header-link">Your Books</a></li>
      </ul>

      <?php
      include './includes/config.php';
      $sql = "SELECT * FROM t_user WHERE user_id = '$_SESSION[user_id]'";
      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      $row = mysqli_fetch_assoc($result);
      ?>

      <ul class="navbar-nav col-md-3 text-end">
        <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $row['first_name'] . " " . $row['last_name']; ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="./user_profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="#">History</a></li>
            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>

    <section id="body">
      <div class="row justify-content-center">
        <div class="card col-11 col-xxl-6 col-xl-7 col-lg-8 col-md-10 mb-4">
          <div class="card-body">
            <h3 class="mb-4">Edit Profile</h3>
            <form action="update_profile.php" method="post" class="needs-validation">
              <div class="row">
                <div class="col-12 col-sm-6 mb-3">
                  <label for="first_name" class="form-label">First Name:</label>
                  <input type="text" name="first_name" class="form-control" value="<?php echo $row['first_name']; ?>" required>
                  <div class="invalid-feedback">
                    Please insert your first name.
                  </div>
                </div>
                <div class="col-12 col-sm-6 mb-3">
                  <label for="last_name" class="form-label">Last Name:</label>
                  <input type="text" name="last_name" class="form-control" value="<?php echo $row['last_name']; ?>" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="birthdate" class="form-label">Birthdate:</label>
                <input type="date" name="birthdate" class="form-control" value="<?php echo $row['birthdate']; ?>">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number:</label>
                <input type="tel" name="phone" class="form-control" maxlength="15" value="<?php echo $row['phone']; ?>">
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>">
              </div>
              <div class="text-center">
                <input type="submit" value="Update Profile" class="btn btn-yellow">
              </div>
            </form>
          </div>
        </div>
        <div class="text-center mb-5">
          <h6><a href="login2.php">Return to Home</a></h6>
        </div>
      </div>
    </section>
  </div>

  <footer class="footer mt-auto pt-3">
    <div class="container">
      <p class="text-center text-body-secondary border-top py-3 m-0">© João Martins. All Rights Reserved</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>