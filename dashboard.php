<?php
include('includes/db.php');
include('includes/auth.php');
check_login();
include('includes/header.php');
$role = $_SESSION['role'];
?>
<h2>Welcome, <?php echo ucfirst($role); ?></h2>
<div>
<?php if($role == 'admin'){ ?>
<a href='admin/manage_users.php'>Manage Users</a><br>
<a href='admin/manage_niches.php'>Manage Niches</a><br>
<a href='admin/manage_deceased.php'>Manage Deceased</a><br>
<a href='admin/generate_report.php'>Generate Reports</a><br>
<?php } ?>
<?php if($role == 'staff'){ ?>
<a href='staff/reservations.php'>View Reservations</a><br>
<a href='staff/update_niche_status.php'>Update Niche Status</a><br>
<?php } ?>
<?php if($role == 'family'){ ?>
<a href='family/view_niches.php'>Reserve Niche</a><br>
<a href='family/view_reservations.php'>My Reservations</a><br>
<?php } ?>
</div>
<?php include('includes/footer.php'); ?>
