<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('admin');
include('../includes/header.php');
if(isset($_POST['add'])){
$name = sanitize($_POST['name']);
$email = sanitize($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];
$stmt = $conn->prepare("INSERT INTO users (name,email,password,role) VALUES (?,?,?,?)");
$stmt->bind_param("ssss", $name,$email,$password,$role);
$stmt->execute();
echo "User added successfully.";
}
?>
<h2>Add User</h2>
<form method='POST'>
<input type='text' name='name' placeholder='Full Name' required>
<input type='email' name='email' placeholder='Email' required>
<input type='password' name='password' placeholder='Password' required>
<select name='role'>
<option value='admin'>Admin</option>
<option value='staff'>Staff</option>
<option value='family'>Family</option>
</select>
<button type='submit' name='add'>Add User</button>
</form>
<?php include('../includes/footer.php'); ?>
