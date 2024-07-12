<?php
include './includes/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $publish_year = $_POST['publish_year'];
    $isbn = $_POST['isbn'];
    $sql = "INSERT INTO t_book (title, genre, publish_year, isbn) VALUES ('$title', '$genre',
$publish_year, '$isbn')";
    if ($conn->query($sql) === TRUE) {
        echo "Book successfully added!";
        header('Location: list_books.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Library - Add Book</title>
</head>

<body>
    <h1>Add Book</h1>
    <form method="POST" action="">
        <label>Title:</label><br>
        <input type="text" name="title" required><br>
        <label>Genre:</label><br>
        <input type="text" name="genre"><br>
        <label>Publish Year:</label><br>
        <input type="number" name="publish_year"><br>
        <label>ISBN:</label><br>
        <input type="text" name="isbn" required><br><br>
        <input type="submit" value="Add">
    </form>
    <a href="list_books.php">Return to the Book List</a>
</body>

</html>