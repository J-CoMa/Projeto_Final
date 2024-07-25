<?php
include '../includes/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $birthdate = $_POST['birthdate'];
  $sql = "INSERT INTO t_author (first_name, last_name, birthdate) VALUES ('$first_name', '$last_name', '$birthdate')";
  if ($conn->query($sql) === TRUE) {
    echo "Author successfully added!";
    header('Location: list_authors.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/style.css">
  <title>WeBooks - Add Author</title>
</head>

<body class="d-flex flex-column h-100">
  <section id="header">
    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
          <span class="fs-4 serif-font text-white"><span class="webooks-text-admin">WE</span>BOOKS</span>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./index.html" class="nav-link px-2 header-link">Home</a></li>
          <li><a href="./list_users.php" class="nav-link px-2 header-link">User List</a></li>
          <li><a href="./list_authors.php" class="nav-link px-2 header-link">Author List</a></li>
          <li><a href="./list_books_admin.php" class="nav-link px-2 header-link">Library</a></li>
          <li><a href="./loans_list.php" class="nav-link px-2 header-link">Loans</a></li>
        </ul>

        <div class="col-md-3 text-end">
          <a class="btn btn-outline-admin" href="../index.html" role="button">Exit</a>
        </div>
      </header>
    </div>
  </section>

  <section id="body">
    <div class="container">
      <h2>Add Author</h2>
      <form method="POST" action="">
        <label>First Name:</label><br>
        <input type="text" name="first_name" required><br>
        <label>Last Name:</label><br>
        <input type="text" name="last_name" required><br>
        <label>Birthdate:</label><br>
        <input type="date" name="birthdate"><br><br>
        <input type="submit" value="Add">
      </form>
      <a href="list_authors.php">Return to the Author List</a>
    </div>
  </section>

  <footer class="footer mt-auto pt-3">
    <div class="container">
      <p class="text-center text-body-secondary border-top py-3 m-0">© João Martins. All Rights Reserved</p>
    </div>
  </footer>
</body>

</html>