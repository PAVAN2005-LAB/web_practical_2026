<?php
// We must start the session before we can destroy it
session_start();

// Unset all of the session variables
session_unset();

// Destroy the session completely from the server
session_destroy();

// Note: We DO NOT destroy the "Remember Me" Cookie here.
// The Cookie should persist so the user's name is remembered next time!

// Redirect back to the login page immediately after destroying state
header("Location: exp10.php");
exit();
?>
