<?php
include './includes/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $publish_year = $_POST['publish_year'];
    $isbn = $_POST['isbn'];
    $sql = "UPDATE t_book SET title='$title', genre='$genre', publish_year=$publish_year,
isbn='$isbn' WHERE book_id=$book_id";
    if ($conn->query($sql) === TRUE) {
        echo "Book successfully updated!";
        header('Location: list_books.php');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
} else {
    $book_id = $_GET['id'];
    $sql = "SELECT * FROM t_book WHERE book_id=$book_id";
    $result = $conn->query($sql);
    $book = $result->fetch_assoc();
}
$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Library - Edit Book</title>
</head>

<body>
    <h1>Edit Book</h1>
    <form method="POST" action="">
        <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
        <label>Title:</label><br>
        <input type="text" name="title" value="<?php echo $book['title']; ?>" required><br>
        <label>Genre:</label><br>
        <input type="text" name="genre" value="<?php echo $book['genre']; ?>"><br>
        <label>Publish Year:</label><br>
        <input type="number" name="publish_year" value="<?php echo $book['publish_year']; ?>"><br>
        <label>ISBN:</label><br>
        <input type="text" name="isbn" value="<?php echo $book['isbn']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <a href="list_books.php">Return to the Book List</a>
</body>

</html>