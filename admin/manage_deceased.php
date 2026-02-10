<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('admin');
include('../includes/header.php');
$deceased = $conn->query("SELECT * FROM deceased");
?>
<h2>Manage Deceased Records</h2>
<a href='add_deceased.php'>Add Deceased</a>
<table border='1'>
<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>DOD</th><th>Photo</th><th>Actions</th></tr>
<?php while($row = $deceased->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fname']; ?></td>
<td><?php echo $row['lname']; ?></td>
<td><?php echo $row['dob']; ?></td>
<td><?php echo $row['dod']; ?></td>
<td><img src='../assets/photos/<?php echo $row['photo']; ?>' width='50'></td>
<td><a href='edit_deceased.php?id=<?php echo $row['id']; ?>'>Edit</a></td>
</tr>
<?php } ?>
</table>
<?php include('../includes/footer.php'); ?>
