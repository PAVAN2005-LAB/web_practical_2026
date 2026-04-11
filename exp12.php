<?php
// Connect PHP with MySQL
$conn = mysqli_connect("localhost", "root", "", "college_db");

// Handle database connection failure error
if (!$conn) {
    echo "<b>Database Connection Failed!</b><br>";
    echo "Error Details: " . mysqli_connect_error() . "<br>";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get form data
    $name = $_POST['fname'];
    $enroll = $_POST['enroll'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // Insert into database if connection is working
    if ($conn) {
        $sql = "INSERT INTO users (full_name, enrollment_no, email, mobile_no) VALUES ('$name', '$enroll', '$email', '$mobile')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Success: Record inserted into database!";
        } else {
            echo "Error Inserting Record: " . mysqli_error($conn);
        }
    }
}
?>

<html>
<head><title>Exp 12 MySQL Logic</title></head>
<body>
    <h2>User Registration details to Database (Exp 12)</h2>
    <form method="POST" action="exp12.php">
        Full Name: <br>
        <input type="text" name="fname"><br><br>
        
        Enrollment No: <br>
        <input type="text" name="enroll"><br><br>
        
        Email ID: <br>
        <input type="text" name="email"><br><br>
        
        Mobile No: <br>
        <input type="text" name="mobile"><br><br>
        
        <input type="submit" value="Save to Database">
    </form>
</body>
</html>
