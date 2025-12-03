<?php
session_start();
require 'includes/db_connect.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $dbuser, $dbpass);
        $stmt->fetch();

        // ✅ CHECK HASHED PASSWORD CORRECTLY
        if (password_verify($password, $dbpass)) {
            $_SESSION['user'] = $dbuser;
            header("Location: dashboard.php");
            exit();
        } else {
            $message = "Incorrect password.";
        }
    } else {
        $message = "User not found.";
    }

    $stmt->close();
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login - Inventory System</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="login-box">
  <h2>Admin Login</h2>
  <?php if ($message): ?>
    <p class="error"><?php echo htmlspecialchars($message); ?></p>
  <?php endif; ?>
  <form method="post">
    <label>Username</label><br>
    <input type="text" name="username" required><br><br>
    <label>Password</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
  </form>
</div>
</body>
</html>
