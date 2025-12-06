<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "admin") {
    header("Location: index.php");
    exit;
}
require_once "includes/db_connect.php";
require_once "includes/header.php";
?>

<h1>Admin Dashboard</h1>
<ul>
    <li><a href="add_product.php">Add Product</a></li>
    <li><a href="view_products.php">View / Edit / Delete Products</a></li>
</ul>

<?php require_once "includes/footer.php"; ?>