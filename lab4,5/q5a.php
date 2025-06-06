<?php
// Set cookies (name, value, expire time in seconds)
setcookie("username", "Samira", time() + 3600, "/"); // 1 hour
setcookie("email", "samira@example.com", time() + 3600, "/");

echo "Cookies have been set.<br>";
echo "<a href='cookie_get.php'>Go to retrieve cookie data</a>";
?>
