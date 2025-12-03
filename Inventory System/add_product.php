<?php
require 'includes/auth_check.php';
require 'includes/db_connect.php';
include 'includes/header.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $quantity = intval($_POST['quantity']);
    $price = floatval($_POST['price']);

    $stmt = mysqli_prepare($conn, "INSERT INTO products (name, quantity, price) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sid", $name, $quantity, $price);
    if (mysqli_stmt_execute($stmt)) {
        $message = "Product added.";
    } else {
        $message = "Error adding product.";
    }
    mysqli_stmt_close($stmt);
}
?>
<h2>Add Product</h2>
<p><a href="view_products.php">← Back to products</a></p>

<?php if ($message): ?><p class="success"><?php echo $message; ?></p><?php endif; ?>

<form method="post">
  <label>Name</label><br>
  <input type="text" name="name" required><br><br>

  <label>Quantity</label><br>
  <input type="number" name="quantity" value="0" required><br><br>

  <label>Price</label><br>
  <input type="number" step="0.01" name="price" value="0.00" required><br><br>

  <button type="submit">Add Product</button>
</form>

<?php include 'includes/footer.php'; ?>
