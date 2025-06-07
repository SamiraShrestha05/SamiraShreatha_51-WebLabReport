<?php
session_start(); 


$_SESSION["username"] = "Samira";
$_SESSION["email"] = "samira@example.com";

echo "Session data stored successfully.<br>";
echo "<a href='q4session_get.php'>Go to retrieve session data</a>";
?>