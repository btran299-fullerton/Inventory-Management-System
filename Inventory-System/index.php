<?php
session_start();
require_once "includes/db_connect.php";

$error = "";

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
    <title>Login - Inventory System</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: <div id="f0f2f5"></div>;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 30px;
            width: 320px;
            border-radius: 8px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2{
            margin-bottom: 20px;
            color: #333;
        }
        input{
            width: 90%;
            padding: 10px;
            margin: 10px;
            border: 1px solid #aaa;
            border-radius: 5px;
            font-size: 14px;
        }
        button{
            width: 95%;
            padding: 10px;
            background: #0066cc;
            border:none;
            border-radius: 5px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }
        .error{
            color: red;
            margin-top: 10px;
            font-size:14px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Inventory System Login</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</div>

</body>
</html>