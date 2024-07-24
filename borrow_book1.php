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
  <meta http-equiv="refresh" content="3;url=login2.php">
  <title>WeBook - Borrow</title>
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
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id'];
    $loan_date = $_POST['loan_date'];
    $expiration_date = $_POST['expiration_date'];
    $sql1 = "INSERT INTO t_loan (book_id, user_id, loan_date, expiration_date) VALUES
    ($book_id, $user_id, '$loan_date', '$expiration_date')";
    $sql2 = "UPDATE t_book SET borrowed = 1 WHERE book_id = $book_id";
    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
      echo "<div class='text-center mb-5'>
            <h3 class='mb-5'>Book Successfully Loaned!</h3>
            <h6>You will be redirected</h6>
            <p>Click <a href='login2.php' target='_self'>here</a> if you dont get automatically redirected.</p>
          </div>";
    } else {
      echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    ?>
  </div>

  <footer class="footer mt-auto pt-5">
    <div class="container">
      <p class="text-center text-body-secondary border-top py-3 m-0">© João Martins. All Rights Reserved</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>