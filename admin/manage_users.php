<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('admin');
include('../includes/header.php');
$users = $conn->query("SELECT * FROM users");
?>
<h2>Manage Users</h2>
<a href='add_user.php'>Add User</a>
<table border='1'>
<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
<?php while($row = $users->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['role']; ?></td>
<td>
<a href='edit_user.php?id=<?php echo $row['id']; ?>'>Edit</a>
</td>
</tr>
<?php } ?>
</table>
<?php include('../includes/footer.php'); ?>
