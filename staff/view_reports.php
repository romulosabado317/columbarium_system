<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('staff');
include('../includes/header.php');

// Placeholder for staff-specific reports, e.g., upcoming expirations, occupancy by floor
?>

<h2>Staff Reports</h2>
<p>Reports such as upcoming reservation expirations and niche occupancy will be displayed here.</p>

<?php include('../includes/footer.php'); ?>
