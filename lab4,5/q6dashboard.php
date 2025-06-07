<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: q6login.php");
    exit;
}
?>

<h2>Welcome, <?php echo $_SESSION["name"]; ?>!</h2>
<p>You are logged in.</p>
<a href="q6logout.php">Logout</a>
