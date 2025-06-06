
<?php
session_start(); // Start the session

// Destroy all session data
session_unset(); // Unset session variables
session_destroy(); // Destroy the session itself

echo "Session destroyed successfully.<br>";
echo "<a href='session_set.php'>Start session again</a>";
?>
