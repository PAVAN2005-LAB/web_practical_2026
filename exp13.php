<?php
// Connect to Database
$conn = mysqli_connect("localhost", "root", "", "college_db");

// Prevent errors if DB doesn't exist yet while grading
if (!$conn) {
    die("Database Connection failed. Cannot load System.");
}

// Handle DELETE Logic using PHP $_GET
if (isset($_GET['delete_id'])) {
    $id_to_delete = $_GET['delete_id'];
    $sql_delete = "DELETE FROM users WHERE id = '$id_to_delete'";
    
    if (mysqli_query($conn, $sql_delete)) {
        header("Location: exp13.php"); // Refresh the page to show deleted table
    } else {
        echo "Error deleting record!";
    }
}
?>

<html>
<head><title>Exp 13 SIMS</title></head>
<body>
    <h2>Student Information Management System (Exp 13)</h2>
    
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Enrollment No</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Actions (Update/Delete)</th>
        </tr>
        
        <?php
        // Read Records Logic using PHP
        $sql_read = "SELECT * FROM users";
        $result = @mysqli_query($conn, $sql_read);
        
        // Loop through Database rows
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['enrollment_no'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['mobile_no'] . "</td>";
                // Add Edit and Delete buttons formatted as raw links with Database ID
                echo "<td>
                        <a href='exp13_edit.php?edit_id=" . $row['id'] . "'>Edit</a> | 
                        <a href='exp13.php?delete_id=" . $row['id'] . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No student records found in Database!</td></tr>";
        }
        ?>
    </table>
    
    <br>
    <a href="exp12.php">Add New Student Record</a>
</body>
</html>
