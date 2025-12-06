<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Inventory System</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav style="background:#333; padding:10px; color:white;">
    <span>Inventory System</span>

    <?php if (isset($_SESSION["username"])): ?>
        <span style="margin-left:20px;">Logged in as: <?php echo htmlspecialchars($_SESSION["username"]); ?></span>
        <a href="logout.php" style="color:white; margin-left:20px;">Logout</a>
    <?php endif; ?>
</nav>

<div class="container" style="padding:20px;">
