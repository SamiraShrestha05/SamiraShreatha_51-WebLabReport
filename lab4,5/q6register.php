<?php
$conn = new mysqli("localhost", "root", "", "auth_demo");
if ($conn->connect_error) die("Connection failed");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if ($name && $email && $_POST["password"]) {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        if ($stmt->execute()) echo "Registration successful. <a href='login.php'>Login</a>";
        else echo "Error: " . $stmt->error;
        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}
$conn->close();
?>

<form method="post">
    Name: <input name="name"><br><br>
    Email: <input name="email"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Register">
</form>
