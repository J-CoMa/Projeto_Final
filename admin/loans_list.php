<?php
session_start();
include '../includes/config.php';
$sql = "SELECT * FROM t_loan";
$result_loan = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/style.css">
  <?php include '../includes/validation_admin.php'; ?>
  <title>WeBooks - Loans List</title>
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
          <li><a href="./list_authors.php" class="nav-link px-2 header-link">Author List</a></li>
          <li><a href="./list_books_admin.php" class="nav-link px-2 header-link">Library</a></li>
          <li><a href="./loans_list.php" class="nav-link px-2 header-link-secondary">Loans</a></li>
        </ul>

        <div class="col-md-3 text-end">
          <a class="btn btn-outline-admin" href="../login2.php" role="button">Exit</a>
        </div>
      </header>
    </div>
  </section>

  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pb-4 mb-4 border-bottom">
      <h1 class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">Loans List</h1>
    </div>
  </div>

  <section id="listing">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-md-between pb-4 mb-4">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Book</th>
              <th>User</th>
              <th>Loan Date</th>
              <th>Expiration Date</th>
              <th>Delivery Date</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php while ($row_loan = $result_loan->fetch_assoc()) : ?>
              <tr>
                <td><?php echo $row_loan['loan_id']; ?></td>
                <td>
                  <?php
                  $sql_book = "SELECT title FROM t_book WHERE book_id = " . $row_loan['book_id'];
                  $result_book = $conn->query($sql_book);
                  $row_book = $result_book->fetch_assoc();
                  echo $row_book['title'];
                  ?>
                </td>
                <td>
                  <?php
                  $sql_user = "SELECT first_name, last_name FROM t_user WHERE user_id = " . $row_loan['user_id'];
                  $result_user = $conn->query($sql_user);
                  $row_user = $result_user->fetch_assoc();
                  echo $row_user['first_name'] . " " . $row_user['last_name'];
                  ?>
                </td>
                <td>
                  <?php echo $row_loan['loan_date']; ?>
                </td>
                <td>
                  <?php
                  $expiration_date = new DateTime($row_loan['expiration_date']);
                  $now = new DateTime();
                  if ($expiration_date < $now)
                    echo "<span class='text-danger'>" . $row_loan['expiration_date'] . "</span> (Overdue)";
                  else
                    echo $row_loan['expiration_date'];
                  ?>
                </td>
                <td class="d-flex align-items-center">
                  <?php
                  if ($row_loan['delivery_date'] == null && $expiration_date < $now)
                    echo "<span class=''>Not Delivered </span><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-exclamation-triangle text-danger ms-2' viewBox='0 0 16 16'>
                            <path d='M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z'/>
                            <path d='M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z'/>
                          </svg>";
                  else if ($row_loan['delivery_date'] == null)
                    echo "<span>Not Delivered</span>";
                  else
                    echo $row_loan['delivery_date'];
                  ?>
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