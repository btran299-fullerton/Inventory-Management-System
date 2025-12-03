<?php
require 'includes/auth_check.php';
require 'includes/db_connect.php';
include 'includes/header.php';

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $contact = trim($_POST['contact']);
    $email = trim($_POST['email']);

    $stmt = mysqli_prepare($conn, "INSERT INTO suppliers (name, contact, email) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $name, $contact, $email);
    if (mysqli_stmt_execute($stmt)) { $msg = 'Supplier added.'; } else { $msg = 'Error.';}
    mysqli_stmt_close($stmt);
}
?>
<h2>Add Supplier</h2>
<p><a href="view_suppliers.php">← Back to suppliers</a></p>
<?php if ($msg): ?><p class="success"><?php echo $msg; ?></p><?php endif; ?>

<form method="post">
  <label>Supplier Name</label><br>
  <input type="text" name="name" required><br><br>

  <label>Contact</label><br>
  <input type="text" name="contact"><br><br>

  <label>Email</label><br>
  <input type="email" name="email"><br><br>

  <button type="submit">Add Supplier</button>
</form>

<?php include 'includes/footer.php'; ?>
