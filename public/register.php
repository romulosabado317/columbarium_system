<?php
include('../includes/db.php');
include('../includes/header.php');

if(isset($_POST['register'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name,email,password,role) VALUES (?,?,?, 'family')");
    $stmt->bind_param("sss",$name,$email,$password);

    if($stmt->execute()){
        echo "<p style='text-align:center; color:green;'>Registration successful! <a href='login.php'>Login now</a>.</p>";
    } else {
        echo "<p style='text-align:center; color:red;'>Email already exists.</p>";
    }
}
?>

<h2>Register</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="register">Register</button>
</form>

<?php include('../includes/footer.php'); ?>
