<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "admin") {
    header("Location: index.php");
    exit;
}
require_once "includes/db_connect.php";
require_once "includes/header.php";
?>

<div class="card">
    <h1 class="page-title">Admin Dashboard</h1>
    <p class="muted">
        Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>.
        <span class="badge">Admin</span>
    </p>

    <div class="dashboard-grid">
        <a href="add_product.php" class="btn btn-primary">Add Product</a>
        <a href="view_products.php" class="btn btn-secondary">View / Edit / Delete Products</a>
    </div>
</div>

<?php require_once "includes/footer.php"; ?>
