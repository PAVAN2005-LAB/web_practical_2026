<?php
// Connect to Database
$conn = mysqli_connect("localhost", "root", "", "college_db");

// Get the specific ID of the student we want to edit from the URL (?edit_id=...)
$edit_id = "";
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
}

// Handle UPDATE Logic using PHP $_POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get updated values from the form
    $name = $_POST['fname'];
    $enroll = $_POST['enroll'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    
    // Write UPDATE SQL script
    $sql_update = "UPDATE users SET full_name='$name', enrollment_no='$enroll', email='$email', mobile_no='$mobile' WHERE id='$edit_id'";
    
    // Execute query
    if (mysqli_query($conn, $sql_update)) {
        // Automatically send user back to the Table view
        header("Location: exp13.php");
    } else {
        echo "Error Updating Record: " . mysqli_error($conn);
    }
}

// Pre-fill the form: Fetch current details of this specific student
$sql_select = "SELECT * FROM users WHERE id='$edit_id'";
$result = @mysqli_query($conn, $sql_select);

// Safety array just in case DB doesn't exist
$row = ['full_name'=>'', 'enrollment_no'=>'', 'email'=>'', 'mobile_no'=>''];
if ($result) {
    $row = mysqli_fetch_assoc($result);
}
?>

<html>
<head><title>Edit Student</title></head>
<body>
    <h2>Edit Student Record (Exp 13)</h2>
    
    <form method="POST">
        Full Name: <br>
        <input type="text" name="fname" value="<?php echo $row['full_name']; ?>"><br><br>
        
        Enrollment No: <br>
        <input type="text" name="enroll" value="<?php echo $row['enrollment_no']; ?>"><br><br>
        
        Email ID: <br>
        <input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>
        
        Mobile No: <br>
        <input type="text" name="mobile" value="<?php echo $row['mobile_no']; ?>"><br><br>
        
        <input type="submit" value="Update Student Details">
    </form>
    
    <br>
    <a href="exp13.php">Cancel and Go Back</a>
</body>
</html>
