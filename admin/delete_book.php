<?php
include './includes/config.php';
$book_id = $_GET['id'];
$sql = "DELETE FROM t_book WHERE book_id=$book_id";
if ($conn->query($sql) === TRUE) {
    echo "Book successfully deleted!";
} else {
    echo "Error deleting: " . $conn->error;
}
$conn->close();
header('Location: list_books_admin.php');
