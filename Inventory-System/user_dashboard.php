<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
require_once "includes/header.php";
?>

<h1>User Dashboard</h1>
<p>Welcome, <?php echo $_SESSION["username"]; ?></p>

<ul>
    <li><a href="view_products.php">View Products</a></li>
</ul>

<?php require_once "includes/footer.php"; ?>
