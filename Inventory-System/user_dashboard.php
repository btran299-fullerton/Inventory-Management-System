<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
require_once "includes/header.php";
?>

<div class="card">
    <h1 class="page-title">User Dashboard</h1>
    <p class="muted">
        Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>.
    </p>

    <div class="dashboard-grid">
        <a href="view_products.php" class="btn btn-primary">View Products</a>
    </div>
</div>

<?php require_once "includes/footer.php"; ?>