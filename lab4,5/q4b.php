<?php
session_start(); // Start the session

if (isset($_SESSION["username"]) && isset($_SESSION["email"])) {
    echo "Username: " . $_SESSION["username"] . "<br>";
    echo "Email: " . $_SESSION["email"] . "<br>";
} else {
    echo "No session data found.<br>";
}

echo "<a href='session_destroy.php'>Click here to destroy session</a>";
?>
