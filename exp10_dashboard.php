<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: exp10.php");
}
?>

<html>
<head><title>Dashboard</title></head>
<body>
    <h2>User Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    <p>Your session is working properly.</p>
    
    <a href="exp10_logout.php">Click here to Logout</a>
</body>
</html>
