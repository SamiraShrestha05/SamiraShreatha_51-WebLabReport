<?php

$conn = new mysqli("localhost", "root", "", "library");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);


$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
    <style>
        table { border-collapse: collapse; width: 90%; margin: 20px auto; }
        th, td { border: 1px solid #333; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>List of Books</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Publisher</th>
            <th>Author</th>
            <th>Edition</th>
            <th>No. of Pages</th>
            <th>Price</th>
            <th>Publish Date</th>
            <th>ISBN</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row["id"]}</td>
                        <td>{$row["title"]}</td>
                        <td>{$row["publisher"]}</td>
                        <td>{$row["author"]}</td>
                        <td>{$row["edition"]}</td>
                        <td>{$row["no_of_page"]}</td>
                        <td>{$row["price"]}</td>
                        <td>{$row["publish_date"]}</td>
                        <td>{$row["isbn"]}</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No books found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
