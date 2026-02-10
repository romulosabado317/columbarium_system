<?php
include('../includes/db.php');
session_start();
if($_SESSION['role'] != 'admin') { header('Location: ../index.php'); }
$users = $conn->query("SELECT * FROM users");
?>
<h2>Manage Users</h2>
<a href='add_user.php'>Add User</a>
<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr>
<?php while($row = $users->fetch_assoc()) { ?>
<tr><td><?php echo $row['id']; ?></td><td><?php echo $row['name']; ?></td><td><?php echo $row['email']; ?></td><td><?php echo $row['role']; ?></td></tr>
<?php } ?></table>
