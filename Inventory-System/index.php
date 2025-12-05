<?php
session_start();
require_once "includes/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Fetch user
    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // SIMPLE CHECK (no hashing)
        if ($password == $row["password"]) {

            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];

            // Admin goes to admin dashboard
            if ($row["username"] === "admin") {
                header("Location: admin_dashboard.php");
                exit;
            } 
            // Normal user goes to user dashboard
            else {
                header("Location: user_dashboard.php");
                exit;
            }
        }
    }

    $error = "Invalid username or password!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Inventory System Login</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

</body>
</html>