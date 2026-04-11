// JavaScript Validation using Regular Expressions (Regex) for Experiment 8

function validateForm() {
    // 1. Get values from the input boxes
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobileNo").value;
    var password = document.getElementById("password").value;
    
    // 2. Get the span elements where we will show error messages
    var emailError = document.getElementById("emailError");
    var mobileError = document.getElementById("mobileError");
    var passwordError = document.getElementById("passwordError");
    
    // We assume the form is true/valid initially
    var isValid = true;
    
    // Clear any previous error messages
    emailError.innerHTML = "";
    mobileError.innerHTML = "";
    passwordError.innerHTML = "";
    
    
    // ----------------------------------------------------
    // A. Email Regex Validation
    // ----------------------------------------------------
    // Standard basic email format: something@something.something
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    
    if (!emailRegex.test(email)) {
        emailError.innerHTML = "Error: Please enter a valid email adddress.";
        isValid = false;
    }
    
    
    // ----------------------------------------------------
    // B. Mobile Number Regex Validation
    // ----------------------------------------------------
    // Must be exactly 10 digits from 0-9
    var mobileRegex = /^[0-9]{10}$/;
    
    if (!mobileRegex.test(mobile)) {
        mobileError.innerHTML = "Error: Mobile number must be exactly 10 digits.";
        isValid = false;
    }
    
    
    // ----------------------------------------------------
    // C. Password Strength Regex Validation
    // ----------------------------------------------------
    // At least 6 chars, 1 uppercase, 1 lowercase letter, and 1 number
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
    
    if (!passwordRegex.test(password)) {
        passwordError.innerHTML = "Weak Password! Must be at least 6 characters, contain 1 uppercase, 1 lowercase, and 1 number.";
        isValid = false;
    }
    
    
    // ----------------------------------------------------
    // Final check
    // ----------------------------------------------------
    if (isValid == true) {
        alert("Success! Form validated correctly.");
        return true; // Form submittion allowed
    } else {
        return false; // Stop form submission so user can see errors
    }
}
