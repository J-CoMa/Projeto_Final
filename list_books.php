<?php
include './includes/config.php';
$sql = "SELECT * FROM t_book";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
    <title>WeBooks - Book Listing</title>
</head>

<body>
    <section id="header">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
                    <span class="fs-4 serif-font text-white"><span class="webooks-text-yellow">WE</span>BOOKS</span>
                </a>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="./Index.html" class="nav-link px-2 header-link">Home</a></li>
                    <li><a href="./list_books.php" class="nav-link px-2 header-link-secondary">Books</a></li>
                    <li><a href="#" class="nav-link px-2 header-link">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 header-link">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 header-link">About</a></li>
                </ul>

                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-outline-yellow me-2">Login</button>
                    <button type="button" class="btn btn-yellow">Sign-up</button>
                </div>
            </header>
        </div>
    </section>

    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pb-4 mb-4 border-bottom">
            <h1 class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">Book Listing</h1>
            <div class="col-12 col-md-auto mb-md-0 text-center">
                <button type="button" class="btn btn-light" onclick="window.open('add_book.php', '_self')">Add Book</button>
            </div>
        </div>
    </div>

    <section id="listing">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-md-between pb-4 mb-4">
                <table class="table table-hover"> <!-- table-striped -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Genre</th>
                            <th>Publish Year</th>
                            <th>ISBN</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['book_id']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['genre']; ?></td>
                                <td><?php echo $row['publish_year']; ?></td>
                                <td><?php echo $row['isbn']; ?></td>
                                <td>
                                    <a class="btn btn-outline-light me-2" href="edit_book.php?id=<?php echo $row['book_id']; ?>" role="button">Editar</a>
                                    <a class="btn btn-outline-danger" href="delete_book.php?id=<?php echo $row['book_id']; ?>" role="button" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>

<?php
$conn->close();
?>