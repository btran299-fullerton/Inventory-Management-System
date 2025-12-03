<?php
require 'includes/auth_check.php';
require 'includes/db_connect.php';
include 'includes/header.php';

// Get summary counts
$p_count = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM products"))[0];
$s_count = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM suppliers"))[0];
$low_count = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM products WHERE quantity <= 5"))[0];
?>
<h2>Dashboard</h2>
<div class="cards">
  <div class="card">
    <h3>Products</h3>
    <p><?php echo $p_count; ?></p>
  </div>
  <div class="card">
    <h3>Suppliers</h3>
    <p><?php echo $s_count; ?></p>
  </div>
  <div class="card">
    <h3>Low Stock (≤5)</h3>
    <p><?php echo $low_count; ?></p>
  </div>
</div>

<p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['user']); ?></strong></p>

<?php include 'includes/footer.php'; ?>
