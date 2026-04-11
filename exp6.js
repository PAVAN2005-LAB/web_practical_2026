// SIMPLE CALCULATOR FUNCTIONS
// Here we are creating 4 simple functions for basic math

function add() {
    // 1. Get the values from the text boxes
    var n1 = document.getElementById("num1").value;
    var n2 = document.getElementById("num2").value;

    // 2. Convert them from text to Decimal numbers using parseFloat
    var num1 = parseFloat(n1);
    var num2 = parseFloat(n2);

    // 3. Do the math
    var result = num1 + num2;

    // 4. Show the result on the screen
    document.getElementById("calc-result").innerHTML = "Result: " + result;
}

function subtract() {
    var n1 = document.getElementById("num1").value;
    var n2 = document.getElementById("num2").value;

    var num1 = parseFloat(n1);
    var num2 = parseFloat(n2);

    var result = num1 - num2;

    document.getElementById("calc-result").innerHTML = "Result: " + result;
}

function multiply() {
    var n1 = document.getElementById("num1").value;
    var n2 = document.getElementById("num2").value;

    var num1 = parseFloat(n1);
    var num2 = parseFloat(n2);

    var result = num1 * num2;

    document.getElementById("calc-result").innerHTML = "Result: " + result;
}

function divide() {
    var n1 = document.getElementById("num1").value;
    var n2 = document.getElementById("num2").value;

    var num1 = parseFloat(n1);
    var num2 = parseFloat(n2);

    if (num2 == 0) {
        document.getElementById("calc-result").innerHTML = "Result: Cannot divide by zero!";
    } else {
        var result = num1 / num2;
        document.getElementById("calc-result").innerHTML = "Result: " + result;
    }
}


// EMI CALCULATOR FUNCTION
function calculateEMI() {
    // 1. Get the values from the text boxes
    var p = document.getElementById("principal").value;
    var r = document.getElementById("rate").value;
    var t = document.getElementById("tenure").value;

    // 2. Convert them to decimal numbers
    var principal = parseFloat(p);
    var rate = parseFloat(r);
    var tenure = parseFloat(t); // Using tenure directly as N (Total months)

    // Check if input is empty or invalid
    if (isNaN(principal) || isNaN(rate) || isNaN(tenure)) {
        alert("Please enter valid numbers");
        return; // stop execution
    }

    // 3. Convert yearly interest rate to a monthly decimal value
    // (Annual Rate / 12) / 100
    var monthlyRate = rate / 12 / 100;

    // 4. Calculate EMI using the formula: P * R * (1+R)^N / ((1+R)^N - 1)

    // Math.pow is used to calculate powers (base, exponent)
    // Here we calculate (1 + R)^N
    var powerPart = Math.pow(1 + monthlyRate, tenure);

    var emi = (principal * monthlyRate * powerPart) / (powerPart - 1);

    // 5. Update the result space on screen, toFixed(2) keeps 2 decimal points
    document.getElementById("emi-result").innerHTML = "EMI: ₹ " + emi.toFixed(2);
}
