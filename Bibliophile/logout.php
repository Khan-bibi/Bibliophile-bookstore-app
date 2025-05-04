<?php
session_start();
session_destroy(); // Destroy the session on logout
header("Location: index.php"); // Redirect to the homepage or login page
exit();
?>
