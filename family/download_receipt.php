<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('family');

// Placeholder: Generate a simple receipt PDF with reservation details using FPDF or TCPDF
$reservation_id = $_GET['reservation_id'] ?? 0;

// Query reservation details
$res = $conn->query("
    SELECT r.id, u.name AS family_name, n.floor, n.section, n.number, r.payment_status
    FROM reservations r
    JOIN users u ON r.user_id = u.id
    JOIN niches n ON r.niche_id = n.id
    WHERE r.id=$reservation_id
")->fetch_assoc();

if($res){
    echo "<h2>Receipt for Reservation ID {$res['id']}</h2>";
    echo "<p>Family: {$res['family_name']}</p>";
    echo "<p>Niche: Floor {$res['floor']} {$res['section']}-{$res['number']}</p>";
    echo "<p>Payment Status: {$res['payment_status']}</p>";
}else{
    echo "<p>Reservation not found.</p>";
}
?>
