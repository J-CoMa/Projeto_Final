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
  <?php include './includes/validation.php'; ?>
  <title>WeBooks - Loan Details</title>
</head>

<body class="d-flex flex-column h-100">
  <section id="header">
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
              <?php if ($row_header['admin'] == 1) {
                echo "<li><a class='dropdown-item text-info' href='./admin/index.php'>Admin Page</a></li>";
              }
              ?>
              <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </header>
    </div>
  </section>

  <?php
  include './includes/config.php';
  $book_id = $_GET['book_id'];
  $user_id = $_SESSION['user_id'];
  $sql_book = "SELECT * FROM t_book WHERE book_id = $book_id";
  $result_book = $conn->query($sql_book);
  $row_book = $result_book->fetch_assoc();
  $sql_loan = "SELECT * FROM t_loan WHERE book_id = $book_id
  AND user_id = $user_id AND delivery_date IS NULL";
  $result_loan = $conn->query($sql_loan);
  $row_loan = $result_loan->fetch_assoc();
  $conn->close();
  ?>

  <section id="body">
    <div class="container">
      <div class="row justify-content-center">
        <div class="card col-11 col-xxl-6 col-xl-7 col-lg-8 col-md-10 mb-4">
          <div class="card-body">
            <h3 class="mb-4">Book Details</h3>
            <form action="./borrow_book1.php" method="post" class="needs-validation">
              <input type="hidden" name="book_id" value="<?php echo $row_book['book_id']; ?>">
              <div class="row mb-2 mb-sm-1">
                <label for="title" class="col-sm-3 col-form-label">Title:</label>
                <div class="col-sm-9">
                  <input type="text" name="title" readonly class="form-control-plaintext" value="<?php echo $row_book['title']; ?>" required>
                </div>
              </div>
              <div class="row mb-2 mb-sm-1">
                <label for="genre" class="col-sm-3 col-form-label">Genre:</label>
                <div class="col-sm-9">
                  <input type="text" name="genre" readonly class="form-control-plaintext" value="<?php echo $row_book['genre']; ?>" required>
                </div>
              </div>
              <div class="row mb-2 mb-sm-1">
                <label for="publish_year" class="col-sm-3 col-form-label">Publish Year:</label>
                <div class="col-sm-9">
                  <input type="text" name="publish_year" readonly class="form-control-plaintext" value="<?php echo $row_book['publish_year']; ?>" required>
                </div>
              </div>
              <div class="row mb-5">
                <label for="isbn" class="col-sm-3 col-form-label">ISBN:</label>
                <div class="col-sm-9">
                  <input type="text" name="isbn" readonly class="form-control-plaintext" value="<?php echo $row_book['isbn']; ?>" required>
                </div>
              </div>
              <h3 class="mb-4">Loan Details</h3>
              <div class="row mb-2 mb-sm-1">
                <label for="loan_date" class="col-sm-3 col-form-label">Loan Date:</label>
                <div class="col-sm-9">
                  <input type="date" name="loan_date" readonly class="form-control-plaintext" value="<?php echo $row_loan['loan_date']; ?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="expiration_date" class="col-sm-3 col-form-label">Expiration_Date:</label>
                <div class="col-sm-9">
                  <input type="date" name="expiration_date" readonly class="form-control-plaintext" value="<?php echo $row_loan['expiration_date']; ?>" required>
                </div>
              </div>

              <div class="text-center">
                <a class="btn btn-yellow" href="return_book.php?book_id=<?php echo $row_book['book_id']; ?>&loan_id=<?php echo $row_loan['loan_id']; ?>" role="button" onclick="return confirm('Are you sure you want to return this book?');">Return</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="text-center">
        <a href="owned_books.php">Return to your Book List</a>
      </div>
    </div>
  </section>

  <footer class="footer mt-auto pt-5">
    <div class="container">
      <p class="text-center text-body-secondary border-top py-3 m-0">© João Martins. All Rights Reserved</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>