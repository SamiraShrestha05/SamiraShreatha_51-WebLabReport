
<?php
session_start(); 


session_unset(); 
session_destroy(); 

echo "Session destroyed successfully.<br>";
echo "<a href='q4session_set.php'>Start session again</a>";
?>
