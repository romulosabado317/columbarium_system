include('includes/db.php');
if(!isset($_SESSION['user_id'])){ header('Location: index.php'); }
$role = $_SESSION['role'];
?>
<h1>Welcome <?php echo $role; ?></h1>
<?php if($role == 'admin'){ ?>
<a href='admin/manage_users.php'>Manage Users</a>
<a href='admin/manage_niches.php'>Manage Niches</a>
<?php } ?>
<?php if($role == 'staff'){ ?>
<a href='staff/reservations.php'>View Reservations</a>
<?php } ?>
<?php if($role == 'family'){ ?>
<a href='family/view_niches.php'>Reserve Niche</a>
<?php } ?>
