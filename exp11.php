<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get file details
    $fileName = $_FILES['profilePic']['name'];
    $tempName = $_FILES['profilePic']['tmp_name'];
    $fileSize = $_FILES['profilePic']['size'];
    
    // Get file extension
    $fileArray = explode('.', $fileName);
    $ext = strtolower(end($fileArray));
    
    // Validate image type
    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
        
        // Validate image size (less than 2MB)
        if ($fileSize < 2000000) {
            
            // Create uploads folder if it doesn't exist
            if (!file_exists("uploads")) {
                mkdir("uploads");
            }
            
            // Save file to server
            move_uploaded_file($tempName, "uploads/" . $fileName);
            echo "<b>Profile Picture Uploaded Successfully!</b><br>";
            echo "<img src='uploads/" . $fileName . "' width='150' height='150'>";
            
        } else {
            echo "Error: File size is too large!";
        }
    } else {
        echo "Error: Invalid file type! Only JPG, JPEG, PNG, GIF allowed.";
    }
}
?>

<html>
<head><title>Exp 11 Profile Upload</title></head>
<body>
    <h2>User Profile (Exp 11)</h2>
    
    <form action="exp11.php" method="POST" enctype="multipart/form-data">
        Select Profile Picture:<br><br>
        <input type="file" name="profilePic" required><br><br>
        <input type="submit" value="Upload Image">
    </form>
</body>
</html>
