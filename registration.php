<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
// connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sql";

$conn = new mysqli($servername, $username, $password, $dbname);

// check for form submission
if(isset($_POST['submit'])) {
  // get form data
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // insert data into database
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
  if($conn->query($sql) === TRUE) {
    echo "User registered successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // close database connection
  $conn->close();
}
?>

    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>
