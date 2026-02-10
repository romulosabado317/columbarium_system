<?php
include('../includes/db.php');
include('../includes/header.php');
?>
<h1>Welcome to Maria Della Strada Columbarium</h1>
<p style="text-align:center;">Explore niches, register, or login to reserve a niche for your loved ones.</p>
<div style="text-align:center; margin:20px;">
    <a href="search.php"><button>View Niches</button></a>
    <a href="register.php"><button>Register</button></a>
    <a href="login.php"><button>Login</button></a>
</div>

<h2>Search Niches</h2>
<form method="GET" action="search.php" class="search-box">
    <input type="text" name="q" placeholder="Search by floor, section, or number" required>
    <button type="submit">Search</button>
</form>

<?php include('../includes/footer.php'); ?>
