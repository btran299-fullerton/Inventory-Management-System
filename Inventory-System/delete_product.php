<?php
require 'includes/auth_check.php';
require 'includes/db_connect.php';

$id = intval($_GET['id'] ?? 0);
if ($id > 0) {
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
}
header('Location: view_products.php');
exit();
?>
