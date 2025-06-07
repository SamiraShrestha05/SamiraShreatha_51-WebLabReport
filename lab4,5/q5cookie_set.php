<?php

setcookie("username", "Samira", time() + 3600, "/"); 
setcookie("email", "samira@example.com", time() + 3600, "/");

echo "Cookies have been set.<br>";
echo "<a href='q5cookie_get.php'>Go to retrieve cookie data</a>";
?>
