<?php
include './includes/config.php';
$sql = "SELECT * FROM t_book";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Book Listing</title>
</head>

<body>
    <h1>Book Listing</h1>
    <a href="add_book.php">Add Book</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Publish Year</th>
            <th>ISBN</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['book_id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['genre']; ?></td>
                <td><?php echo $row['publish_year']; ?></td>
                <td><?php echo $row['isbn']; ?></td>
                <td>
                    <a href="edit_book.php?id=<?php echo $row['book_id']; ?>">Editar</a>
                    <a href="delete_book.php?id=<?php echo $row['book_id']; ?>" 
                    onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>

<?php
$conn->close();
?>