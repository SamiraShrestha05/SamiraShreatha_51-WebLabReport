<?php

$conn = new mysqli("localhost", "root", "", "library");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $publisher = $_POST["publisher"];
    $author = $_POST["author"];
    $edition = $_POST["edition"];
    $no_of_page = (int)$_POST["no_of_page"];
    $price = (float)$_POST["price"];
    $publish_date = $_POST["publish_date"];
    $isbn = $_POST["isbn"];

    if ($title && $isbn) {
        $stmt = $conn->prepare("INSERT INTO books (title, publisher, author, edition, no_of_page, price, publish_date, isbn) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssidsd", $title, $publisher, $author, $edition, $no_of_page, $price, $publish_date, $isbn);
        if ($stmt->execute()) {
            echo "<p style='color:green;'>Book added successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p style='color:red;'>Title and ISBN are required.</p>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head><title>Add Book</title></head>
<body>
    <h2>Add Book</h2>
    <form method="post">
        Title: <input name="title" required><br><br>
        Publisher: <input name="publisher"><br><br>
        Author: <input name="author"><br><br>
        Edition: <input name="edition"><br><br>
        No. of Pages: <input type="number" name="no_of_page"><br><br>
        Price: <input type="number" step="0.01" name="price"><br><br>
        Publish Date: <input type="date" name="publish_date"><br><br>
        ISBN: <input name="isbn" required><br><br>
        <input type="submit" value="Add Book">
    </form>
</body>
</html>
