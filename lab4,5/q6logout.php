<?php
session_start();
session_unset();
session_destroy();
header("Location: q6login.php");
exit;
