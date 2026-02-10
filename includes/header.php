<?php
include('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Maria Della Strada Columbarium</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
    <h1>Maria Della Strada Columbarium</h1>
    <nav>
        <a href="../public/index.php">Home</a>
        <a href="../public/search.php">Search</a>
        <?php if(is_logged_in()): ?>
            <?php if($_SESSION['role']=='admin'): ?>
                <a href="../admin/dashboard.php">Admin Dashboard</a>
            <?php elseif($_SESSION['role']=='staff'): ?>
                <a href="../staff/dashboard.php">Staff Dashboard</a>
            <?php else: ?>
                <a href="../family/dashboard.php">Family Dashboard</a>
            <?php endif; ?>
            <a href="../logout.php">Logout</a>
        <?php else: ?>
            <a href="../public/login.php">Login</a>
            <a href="../public/register.php">Register</a>
        <?php endif; ?>
    </nav>
</header>
<main>
