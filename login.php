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
  <meta http-equiv="refresh" content="3; url=./login2.php">
  <title>WeBooks - Login</title>
</head>

<body class="d-flex flex-column h-100">
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="./login2.php" class="d-flex align-items-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
        <span class="fs-4 serif-font text-white"><span class="webooks-text-yellow">WE</span>BOOKS</span>
      </a>
    </header>

    <?php
    include './includes/config.php';
    $sql = "SELECT * FROM t_user WHERE email = '$_POST[email]'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    if ($row == null) {
      echo "<div class='text-center mb-5'>
              <h3 class='mb-4'>Non-existant user</h3>
              <input type='button' value='Try Again' class='btn btn-yellow' onclick=window.open('index.html','_self')>
            </div>";
    } else {
      if (password_verify($_POST['password'], $row['password'])) {
        echo "<div class='text-center mb-5'>
                <h2  class='mb-4'>Welcome " . $row['first_name'] . " " . $row['last_name'] . "</h2>
                <input type='button' value='Continue' class='btn btn-yellow' onclick=window.open('login2.php','_self')>
              </div>";
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['admin'] = $row['admin'];
      } else {
        echo "<div class='text-center mb-5'>
                <h3 class='mb-4'>Incorrect password</h3>
                <input type='button' value='Try Again' class='btn btn-yellow' onclick=window.open('index.html','_self')>
              </div>";
      }
    }
    mysqli_close($conn);
    ?>
  </div>

  <footer class="footer mt-auto pt-3">
    <div class="container">
      <p class="text-center text-body-secondary border-top py-3 m-0">© João Martins. All Rights Reserved</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>