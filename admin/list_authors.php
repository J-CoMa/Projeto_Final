<?php
session_start();
include '../includes/config.php';
$sql = "SELECT * FROM t_author";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/style.css">
  <?php include '../includes/validation_admin.php'; ?>
  <title>WeBooks - Author List</title>
</head>

<body class="d-flex flex-column h-100">
  <section id="header">
    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
          <span class="fs-4 serif-font text-white"><span class="webooks-text-admin">WE</span>BOOKS</span>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./index.php" class="nav-link px-2 header-link">Home</a></li>
          <li><a href="./list_users.php" class="nav-link px-2 header-link">User List</a></li>
          <li><a href="./list_authors.php" class="nav-link px-2 header-link-secondary">Author List</a></li>
          <li><a href="./list_books_admin.php" class="nav-link px-2 header-link">Library</a></li>
          <li><a href="./loans_list.php" class="nav-link px-2 header-link">Loans</a></li>
        </ul>

        <div class="col-md-3 text-end">
          <a class="btn btn-outline-admin" href="../login2.php" role="button">Exit</a>
        </div>
      </header>
    </div>
  </section>

  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pb-4 mb-4 border-bottom">
      <h1 class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">Author List</h1>
      <div class="col-12 col-md-auto mb-md-0 text-center">
        <button type="button" class="btn btn-light" onclick="window.open('add_author.php', '_self')">Add Author</button>
      </div>
    </div>
  </div>

  <section id="listing">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-md-between pb-4 mb-4">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Birthdate</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php while ($row = $result->fetch_assoc()) : ?>
              <tr>
                <td><?php echo $row['author_id']; ?></td>
                <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                <td><?php echo $row['birthdate']; ?></td>
                <td>
                  <a class="btn btn-outline-yellow" href="./edit_author.php?author_id=<?php echo $row['author_id']; ?>" role="button">Details</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <footer class="footer mt-auto pt-3">
    <div class="container">
      <p class="text-center text-body-secondary border-top py-3 m-0">© João Martins. All Rights Reserved</p>
    </div>
  </footer>
</body>

</html>