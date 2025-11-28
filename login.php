<link rel="stylesheet" href="style.css">
<?php
include "db.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row["password"])){
            $_SESSION["user"] = $row["username"];
            header("Location: welcome.php");
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "Email not found";
    }
}
?>
<div class="container">
    <h2>Login</h2>
    <form method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>

        <p>Don't have an account? <a href="register.php">Register</a></p>
    </form>
</div>


