<?php
session_start(); // Start the session

// Store session data
$_SESSION["username"] = "Samira";
$_SESSION["email"] = "samira@example.com";

echo "Session data stored successfully.<br>";
echo "<a href='session_get.php'>Go to retrieve session data</a>";
?>