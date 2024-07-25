<?php
session_start();
include '../includes/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_id = $_POST['user_id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $tmp = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $birthdate = $_POST['birthdate'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $sql = "UPDATE t_user SET first_name='$first_name', last_name='$last_name', email='$email',
password='$tmp', birthdate='$birthdate', phone='$phone', address='$address' WHERE user_id=$user_id";
  if ($conn->query($sql) === TRUE) {
    echo "User successfully updated!";
    header('Location: list_users.php');
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }
} else {
  $user_id = $_GET['user_id'];
  $sql = "SELECT * FROM t_user WHERE user_id=$user_id";
  $result = $conn->query($sql);
  $book = $result->fetch_assoc();
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
  <?php include '../includes/validation_admin.php'; ?>
  <title>WeBooks - User Profile</title>
</head>

<body class="d-flex flex-column h-100">
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
        <span class="fs-4 serif-font text-white"><span class="webooks-text-admin">WE</span>BOOKS</span>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="./index.php" class="nav-link px-2 header-link">Home</a></li>
        <li><a href="./list_users.php" class="nav-link px-2 header-link">User List</a></li>
        <li><a href="./list_authors.php" class="nav-link px-2 header-link">Author List</a></li>
        <li><a href="./list_books_admin.php" class="nav-link px-2 header-link">Library</a></li>
        <li><a href="./loaned_books.php" class="nav-link px-2 header-link">Loans</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <a class="btn btn-outline-admin" href="../login2.php" role="button">Exit</a>
      </div>
    </header>

    <?php
    include '../includes/config.php';
    $user_id = $_GET['user_id'];
    $sql = "SELECT * FROM t_user WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    ?>

    <section id="body">
      <div class="row justify-content-center">
        <div class="card col-11 col-xxl-6 col-xl-7 col-lg-8 col-md-10 mb-4">
          <div class="card-body">
            <h3 class="mb-4">Edit Profile</h3>
            <form action="edit_user.php" method="post" class="needs-validation">
              <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>" readonly required>
              <div class="row">
                <div class="col-12 col-sm-6 mb-3">
                  <label for="first_name" class="form-label">First Name:</label>
                  <input type="text" name="first_name" class="form-control" value="<?php echo $row['first_name']; ?>" required>
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
          <h6><a href="list_users.php">Return to User List</a></h6>
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