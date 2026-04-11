<?php
// Connect to Database
$conn = mysqli_connect("localhost", "root", "", "college_db");

if (!$conn) {
    die("Database Connection Error");
}

// Ensure the request parameter 'query' is set via the AJAX GET request
if (isset($_GET['query'])) {
    
    // Store it inside a variable
    $searchString = $_GET['query'];
    
    // Write SQL SELECT script using the 'LIKE "%word%"' operator for partial searching
    $sql = "SELECT id, full_name, enrollment_no FROM users WHERE full_name LIKE '%$searchString%'";
    
    $result = mysqli_query($conn, $sql);
    
    // Check if the query found any rows in the database
    if (mysqli_num_rows($result) > 0) {
        
        // Loop through results and print out bare text layout
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<b>Name:</b> " . $row['full_name'] . "<br>";
            echo "<b>Enrollment No:</b> " . $row['enrollment_no'] . "<br>";
            echo "<br>";
        }
        
    } else {
        // If the query returns 0 rows
        echo "<span style='color:red;'>No matching students found in the database.</span>";
    }
}
?>
