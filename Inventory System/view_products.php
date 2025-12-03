<?php
require 'includes/auth_check.php';
require 'includes/db_connect.php';
include 'includes/header.php';

$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>
<h2>Products</h2>
<p><a href="add_product.php">+ Add Product</a></p>
<table class="table">
 <tr><th>ID</th><th>Name</th><th>Qty</th><th>Price</th><th>Actions</th></tr>
 <?php while ($row = mysqli_fetch_assoc($result)): ?>
   <tr>
     <td><?php echo $row['id']; ?></td>
     <td><?php echo htmlspecialchars($row['name']); ?></td>
     <td><?php echo $row['quantity']; ?></td>
     <td><?php echo number_format($row['price'],2); ?></td>
     <td>
       <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a> |
       <a href="delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete product?')">Delete</a>
     </td>
   </tr>
 <?php endwhile; ?>
</table>
<?php include 'includes/footer.php'; ?>
