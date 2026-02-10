<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('admin');
include('../includes/header.php');
$niches = $conn->query("SELECT * FROM niches");
?>
<h2>Manage Niches</h2>
<a href='add_niche.php'>Add Niche</a>
<table border='1'>
<tr><th>ID</th><th>Floor</th><th>Section</th><th>Number</th><th>Status</th><th>Actions</th></tr>
<?php while($row = $niches->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['floor']; ?></td>
<td><?php echo $row['section']; ?></td>
<td><?php echo $row['number']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><a href='edit_niche.php?id=<?php echo $row['id']; ?>'>Edit</a></td>
</tr>
<?php } ?>
</table>
<?php include('../includes/footer.php'); ?>
