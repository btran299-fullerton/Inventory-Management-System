<?php
require 'includes/auth_check.php';
require 'includes/db_connect.php';
include 'includes/header.php';

$isAdmin = (isset($_SESSION["username"]) && $_SESSION["username"] === "admin");
$dashboardUrl = $isAdmin ? "admin_dashboard.php" : "user_dashboard.php";

$sql = "SELECT * FROM products ORDER BY id DESC";

$result = mysqli_query($conn, $sql);
?>

<div class="card">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <div>
            <h2 class="page-title">Products</h2>
            <p class="muted">Current inventory</p>
        </div>
        <div>
            <a href="<?php echo $dashboardUrl; ?>" class="btn btn-secondary">
                Back to Dashboard
            </a>

            <?php if ($isAdmin): ?>
                <a href="add_product.php" class="btn btn-primary">
                    + Add Product
                </a>
            <?php endif; ?>
        </div>
    </div>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price ($)</th>
        <?php if ($isAdmin): ?>
            <th class="text-right">Actions</th>
        <?php endif; ?>
    </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
          <td><?php echo $row["id"]; ?></td>
          <td><?php echo htmlspecialchars($row["name"]); ?></td>
          <td><?php echo $row["quantity"]; ?></td>
          <td><?php echo number_format($row["price"], 2); ?></td>

          <?php if ($isAdmin): ?>
              <td class="text-right">
                  <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">Edit</a>
                  <a href="delete_product.php?id=<?php echo $row['id']; ?>"
                    class="btn btn-danger"
                    onclick="return confirm('Delete this product?');">
                      Delete
                  </a>
              </td>
          <?php endif; ?>
      </tr>
  <?php endwhile; ?>

</table>
<?php include 'includes/footer.php'; ?>
