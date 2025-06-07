<?php

if (isset($_COOKIE["username"]) && isset($_COOKIE["email"])) {
    echo "Username: " . $_COOKIE["username"] . "<br>";
    echo "Email: " . $_COOKIE["email"] . "<br>";
} else {
    echo "Cookies are not set or have expired.<br>";
}

echo "<a href='q5cookie_destroy.php'>Click here to destroy cookies</a>";
?>
