<link rel="stylesheet" href="style.css">
<?php
include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) 
            VALUES ('$username', '$email', '$password')";

    if(mysqli_query($conn, $sql)){
        echo "Registration successful. <a href='login.php'>Login Now</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<div class="container">
    <h2>Register</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>

        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
</div>



