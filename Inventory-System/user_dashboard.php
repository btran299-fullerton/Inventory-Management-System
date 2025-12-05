<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

?>

<h1>User Dashboard</h1>
<p>You are logged in as: <?php echo $_SESSION["username"]; ?></p>

<a href="logout.php">Logout</a>