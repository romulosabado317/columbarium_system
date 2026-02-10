<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('admin');
include('../includes/header.php');
// Placeholder for generating reports (PDF with TCPDF/FPDF)
?>
<h2>Reports</h2>
<p>Reports will be generated here. Filter by date, floor, or status.</p>
<?php include('../includes/footer.php'); ?>
