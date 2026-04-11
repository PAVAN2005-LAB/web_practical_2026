<?php
session_start();

$saved_user = "";
// Check if user is remembered in cookie
if (isset($_COOKIE['username'])) {
    $saved_user = $_COOKIE['username'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    // Check dummy username and password
    if ($user == "admin" && $pass == "admin") {
        
        // Setup session
        $_SESSION['username'] = $user;
        
        // Setup cookie based on checkbox
        if (isset($_POST['remember'])) {
            setcookie("username", $user, time() + 3600); // Save for 1 hour
        } else {
            setcookie("username", "", time() - 3600); // Delete cookie
        }
        
        // Go to dashboard
        header("Location: exp10_dashboard.php");
    } else {
        echo "Incorrect Username or Password!";
    }
}
?>

<html>
<head><title>Exp 10 Login</title></head>
<body>
    <h2>Login Page (Exp 10)</h2>
    <form method="POST" action="exp10.php">
        Username: <input type="text" name="user" value="<?php echo $saved_user; ?>"><br><br>
        Password: <input type="password" name="pass"><br><br>
        <input type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])) echo "checked"; ?>> Remember Me<br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
