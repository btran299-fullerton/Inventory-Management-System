<?php
require 'includes/auth_check.php';
require 'includes/db_connect.php';
include 'includes/header.php';

$res = mysqli_query($conn, "SELECT * FROM suppliers ORDER BY supplier_id DESC");
?>
<h2>Suppliers</h2>
<p><a href="add_supplier.php">+ Add Supplier</a></p>

<table class="table">
<tr><th>ID</th><th>Name</th><th>Contact</th><th>Email</th><th>Actions</th></tr>
<?php while ($row = mysqli_fetch_assoc($res)): ?>
<tr>
  <td><?php echo $row['supplier_id']; ?></td>
  <td><?php echo htmlspecialchars($row['name']); ?></td>
  <td><?php echo htmlspecialchars($row['contact']); ?></td>
  <td><?php echo htmlspecialchars($row['email']); ?></td>
  <td>
    <a href="edit_supplier.php?id=<?php echo $row['supplier_id']; ?>">Edit</a> |
    <a href="delete_supplier.php?id=<?php echo $row['supplier_id']; ?>" onclick="return confirm('Delete supplier?')">Delete</a>
  </td>
</tr>
<?php endwhile; ?>
</table>

<?php include 'includes/footer.php'; ?>
