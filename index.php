<?php
include('includes/db.php');
session_start();
if(isset($_POST['login'])){
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if($result && password_verify($password, $result['password'])){
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['role'] = $result['role'];
        header("Location: dashboard.php");
        exit();
    } else { $error = "Invalid credentials"; }
}
?>
<h2>Login</h2>
<?php if(isset($error)){ echo '<p style="color:red;">'.$error.'</p>'; } ?>
<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" name="login">Login</button>
</form>
