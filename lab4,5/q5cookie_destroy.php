<?php

setcookie("username", "", time() - 3600, "/");
setcookie("email", "", time() - 3600, "/");

echo "Cookies have been destroyed.<br>";
echo "<a href='q5cookie_set.php'>Set cookies again</a>";
?>
