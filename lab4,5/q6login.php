<?php
session_start();
$conn = new mysqli("localhost", "root", "", "auth_demo");
if ($conn->connect_error) die("Connection failed");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $name, $hashed_pw);
        $stmt->fetch();
        if (password_verify($password, $hashed_pw)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["name"] = $name;
            header("Location: q6dashboard.php");
            exit;
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No account with that email.";
    }
    $stmt->close();
}
$conn->close();
?>

<form method="post">
    Email: <input name="email"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>
<form action="q6register.php" method="get">
    <input type="submit" value="Register">
</form>
