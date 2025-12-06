<?php
require 'includes/auth_check.php';

if ($_SESSION['username'] !== 'admin'){
    header('Location: user_dashboard.php');
    exit;
}

require 'includes/db_connect.php';
include 'includes/header.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    echo "<p>Invalid product ID.</p>";
    include 'includes/footer.php';
    exit;
}

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $quantity = intval($_POST['quantity']);
    $price = floatval($_POST['price']);

    $stmt = mysqli_prepare($conn, "UPDATE products SET name=?, quantity=?, price=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sidi", $name, $quantity, $price, $id);
    if (mysqli_stmt_execute($stmt)) { $msg = "Updated."; } else { $msg = "Update error."; }
    mysqli_stmt_close($stmt);
}

// fetch
$res = mysqli_query($conn, "SELECT * FROM products WHERE id = $id LIMIT 1");
$product = mysqli_fetch_assoc($res);
if (!$product) {
    echo "<p>Product not found.</p>";
    include 'includes/footer.php';
    exit;
}
?>
<h2>Edit Product</h2>
<p><a href="view_products.php">← Back to products</a></p>
<?php if ($msg): ?><p class="success"><?php echo $msg; ?></p><?php endif; ?>

<form method="post">
  <label>Name</label><br>
  <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>

  <label>Quantity</label><br>
  <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required><br><br>

  <label>Price</label><br>
  <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required><br><br>

  <button type="submit">Save</button>
</form>

<?php include 'includes/footer.php'; ?>
