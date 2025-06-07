<?php
$conn = new mysqli("localhost", "root", "", "library");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM books");
?>

<h2>Delete a Book</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>Title</th><th>Author</th><th>Publisher</th><th>Delete</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['author']) ?></td>
        <td><?= htmlspecialchars($row['publisher']) ?></td>
        <td><a href="q10remove_book.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a></td>
    </tr>
    <?php } ?>
</table>
