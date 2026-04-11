<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exp 9 - Salary Slip Generated</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .slip-box {
            border: 2px solid #333;
            width: 400px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 8px 0;
            border-bottom: 1px dashed #ccc;
        }
    </style>
</head>
<body>

    <?php
    // Check if the form was actually submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // 1. Collect form data using PHP variables
        $empName = htmlspecialchars($_POST['emp_name']);
        $basicPay = (float)$_POST['basic_pay'];
        $daPercent = (float)$_POST['da_percent'];
        $hraPercent = (float)$_POST['hra_percent'];
        
        // 2. Process data using arithmetic operators
        // Calculate DA Amount
        $daAmount = ($basicPay * $daPercent) / 100;
        
        // Calculate HRA Amount
        $hraAmount = ($basicPay * $hraPercent) / 100;
        
        // Calculate Gross Salary
        $grossSalary = $basicPay + $daAmount + $hraAmount;
        
        // Deductions (Let's assume standard PF Deduction at 12% of basic pay)
        $pfDeduction = ($basicPay * 12) / 100;
        
        // Calculate Net Salary
        $netSalary = $grossSalary - $pfDeduction;
        
        // 3. Display the Salary Slip details
        echo "<div class='slip-box'>";
        echo "<h2 style='text-align:center; margin-top:0;'>Salary Slip</h2>";
        echo "<table>";
        
        echo "<tr><td><b>Employee Name:</b></td><td>" . $empName . "</td></tr>";
        echo "<tr><td><b>Basic Pay:</b></td><td>₹ " . number_format($basicPay, 2) . "</td></tr>";
        echo "<tr><td><b>DA ($daPercent%):</b></td><td>₹ " . number_format($daAmount, 2) . "</td></tr>";
        echo "<tr><td><b>HRA ($hraPercent%):</b></td><td>₹ " . number_format($hraAmount, 2) . "</td></tr>";
        
        echo "<tr><td colspan='2'></td></tr>"; // Spacer
        
        echo "<tr><td><b>GROSS SALARY:</b></td><td><b style='color:#003366;'>₹ " . number_format($grossSalary, 2) . "</b></td></tr>";
        
        echo "<tr><td><b>PF Deduction (12%):</b></td><td>₹ " . number_format($pfDeduction, 2) . "</td></tr>";
        
        echo "<tr><td colspan='2'></td></tr>"; // Spacer
        
        echo "<tr><td><b>NET SALARY:</b></td><td><b style='color:green; font-size:18px;'>₹ " . number_format($netSalary, 2) . "</b></td></tr>";
        
        echo "</table>";
        echo "</div>";
        
        // Button to go back
        echo "<br><br><a href='exp9.html' style='padding:5px 10px; background:#ddd; text-decoration:none; color:black; border:1px solid #999;'>&larr; Calculate Another</a>";
        
    } else {
        // If someone visits exp9.php directly without submitting the form
        echo "<h3>Warning: No form data received!</h3>";
        echo "<a href='exp9.html'>Please go to the form first.</a>";
    }
    ?>

</body>
</html>
