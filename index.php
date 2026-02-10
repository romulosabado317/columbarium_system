<?php
session_start();
include('includes/db.php');
if(isset($_POST['login'])) {
$email = $_POST['email'];
$password = $_POST['password'];
$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
if($result && password_verify($password, $result['password'])) {
$_SESSION['user_id'] = $result['id'];
$_SESSION['role'] = $result['role'];
header("Location: dashboard.php");
} else { echo "Invalid credentials"; }
}
?>
<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" name="login">Login</button>
</form>
