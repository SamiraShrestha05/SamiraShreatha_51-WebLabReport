<?php
$conn = new mysqli("localhost", "root", "", "library");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $book = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$book) {
        echo "Book not found!";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $publisher = $_POST["publisher"];
    $author = $_POST["author"];
    $edition = $_POST["edition"];
    $no_of_page = (int)$_POST["no_of_page"];
    $price = (float)$_POST["price"];
    $publish_date = $_POST["publish_date"];
    $isbn = $_POST["isbn"];


    $stmt = $conn->prepare("UPDATE books SET title=?, publisher=?, author=?, edition=?, no_of_page=?, price=?, publish_date=?, isbn=? WHERE id=?");
    $stmt->bind_param("ssssidssi", $title, $publisher, $author, $edition, $no_of_page, $price, $publish_date, $isbn, $id);
    
    if ($stmt->execute()) {
        echo "Book updated successfully. <a href='q9edit_book.php'>Back to list</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    exit;
}
?>

<h2>Edit Book</h2>
<form method="post">
    <input type="hidden" name="id" value="<?= $book['id'] ?>">
    Title: <input name="title" value="<?= htmlspecialchars($book['title']) ?>"><br><br>
    Publisher: <input name="publisher" value="<?= htmlspecialchars($book['publisher']) ?>"><br><br>
    Author: <input name="author" value="<?= htmlspecialchars($book['author']) ?>"><br><br>
    Edition: <input name="edition" value="<?= htmlspecialchars($book['edition']) ?>"><br><br>
    No. of Pages: <input type="number" name="no_of_page" value="<?= $book['no_of_page'] ?>"><br><br>
    Price: <input type="number" step="0.01" name="price" value="<?= $book['price'] ?>"><br><br>
    Publish Date: <input type="date" name="publish_date" value="<?= $book['publish_date'] ?>"><br><br>
    ISBN: <input name="isbn" value="<?= htmlspecialchars($book['isbn']) ?>"><br><br>
    <input type="submit" value="Update Book">
</form>
