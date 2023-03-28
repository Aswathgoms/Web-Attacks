<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "sql";
    
    $conn = mysqli_connect($host, $username, $password, $database);
 ?>
 <?php  
    session_start();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) >= 1) {
        // Login successful
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard page
        
    } else {
        // Login failed
        echo "Invalid username or password.";
    }
}
    ?>
    <form class="form" method="post" name="login" novalidate>
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" />
        <input type="password" class="login-input" name="password" />
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
  </form>
</body>
</html>
