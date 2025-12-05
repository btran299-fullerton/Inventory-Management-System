<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "admin") {
    header("Location: index.php");
    exit;
}
?>

<h1>Welcome, Admin!</h1>
<p>You are logged in as: <?php echo $_SESSION["username"]; ?></p>

<a href="logout.php">Logout</a>