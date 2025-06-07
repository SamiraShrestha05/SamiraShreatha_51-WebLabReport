<?php
$conn = new mysqli("localhost", "root", "", "library");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);


if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Book deleted successfully. <a href='q10delete_book.php'>Go back to book list</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
