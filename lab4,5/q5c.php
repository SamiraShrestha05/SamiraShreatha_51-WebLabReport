<?php
// Destroy cookies by setting their expiration time to the past
setcookie("username", "", time() - 3600, "/");
setcookie("email", "", time() - 3600, "/");

echo "Cookies have been destroyed.<br>";
echo "<a href='cookie_set.php'>Set cookies again</a>";
?>
