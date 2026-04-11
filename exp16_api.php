<?php
// CRITICAL: We must declare the header Content-Type as application/json!
// This tells the browser or Postman that this is strictly a JSON REST API and NOT an HTML file.
header("Content-Type: application/json; charset=UTF-8");

// Setup the database connection
$conn = @mysqli_connect("localhost", "root", "", "college_db");

// Connection Error Handling
if (!$conn) {
    // We must return a JSON response even if creating the database failed, otherwise the API crashes
    echo json_encode(array(
        "status" => false, 
        "message" => "Database connection failed. Is XAMPP MySQL running?"
    ));
    exit(); // Stop execution
}

// Ensure the client is sending a GET request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    // We are querying `users` (or `students`), aiming for enrollment_no, name, and branch.
    // Using IFNULL or basic selections based on our previous Experiment databases
    $sql = "SELECT enrollment_no, full_name, email FROM users"; 
    $result = @mysqli_query($conn, $sql);
    
    $studentList = array();
    
    if ($result && mysqli_num_rows($result) > 0) {
        
        // Loop through all database rows
        while ($row = mysqli_fetch_assoc($result)) {
            // Push each database row array into our main tracking array
            $studentList[] = $row;
        }
        
        // Use json_encode() to convert the PHP Array into a strict JSON string!
        echo json_encode(array(
            "status" => true, 
            "message" => "Records fetched successfully", 
            "data" => $studentList
        ));
        
    } else {
        // Handle Empty Results logically
        echo json_encode(array(
            "status" => false, 
            "message" => "No student records found in the database."
        ));
    }

} else {
    // If tested with POST or PUT arbitrarily
    echo json_encode(array(
        "status" => false, 
        "message" => "Invalid Request Method. Expected GET request."
    ));
}
?>
