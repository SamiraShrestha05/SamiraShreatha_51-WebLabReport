<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "project";


$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name     = trim($_POST['name']);
    $email    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $phone    = trim($_POST['phone']);
    $gender   = $_POST['gender'] ?? '';
    $faculty  = trim($_POST['faculty']);


    if (empty($name) || empty($email) || empty($_POST['password']) || empty($gender) || empty($faculty)) {
        echo "<p style='color:red;'>All fields are required!</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red;'>Invalid email format!</p>";
    } else {

        $stmt = $conn->prepare("INSERT INTO registrations (name, email, password, phone, gender, faculty) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $password, $phone, $gender, $faculty);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>Registration successful!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form method="post" action="">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone"><br><br>

        <label>Gender:</label><br>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female"> Female
        <input type="radio" name="gender" value="Other"> Other<br><br>

        <label>Faculty:</label><br>
        <input type="text" name="faculty" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>

