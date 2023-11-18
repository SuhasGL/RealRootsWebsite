<?php
include('./includes/connect.php');
 // Start a session if not already started

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adminlogin"])) {
    // Get user input
    $loginEmail = $_POST["email"];
    $loginPassword = $_POST["password"];
    // Database connection details
    
    // Prepare and execute a query to check user credentials
    
    // Check if a matching user is found
    if ($loginEmail=="srivastavashriya20@gmail.com" && $loginPassword=="shreya123") {
        // User is authenticated, set session variables or perform further actions as needed
        $_SESSION["user_email"] = $loginEmail;
        header("Location:http://localhost/realestatedemo/admin/index.php"); // Redirect to the index.php page on successful login
        exit(); // Terminate the script to prevent further execution
    } else {
        // User login failed, display an alert
        echo '<script>alert("Wrong credentials. Please try again.");</script>';
    }

    $con->close();
}
echo'


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealRoots - Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    /* Add your CSS styles here */
    body {
        font-family: Arial, sans-serif;';
        echo"
        background-image: url('./img/signbg2.jpg');";
        echo' 
        background-size: cover; /* Scale the image to cover the entire body */
        background-repeat: no-repeat; /* Prevent image from repeating */
        background-attachment: fixed;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card {
        width: 360px; /* Increased width */
        height: 700px; /* Increased height */
        perspective: 1000px;
        border-radius: 10px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        overflow: hidden;
        margin: auto; /* Center horizontally */
        position: relative; /* Needed for centering vertically */
    }

    .card__inner {
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: transform 0.5s;
    }
    .form__group {
        margin-bottom: 20px;
    }

    .form__input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn {
        align-items: center;
        padding: 10px 20px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    #toggle-login.active,
    #toggle-signup:not(.active) {
        font-weight: bold;
        color: #4caf50;
    }

    #toggle-signup.active,
    #toggle-login:not(.active) {
        font-weight: bold;
        color: #4285f4;
    }
    h1.heading-secondary {
        text-align: center; /* Center-align the heading */
        color: #4caf50; /* Green color */
        font-weight: bold; /* Bold font weight */
        margin-bottom: 20px; /* Add margin below the heading */
    }
    h3.heading-secondary {
        text-align: center; /* Center-align the heading */
        color: black; 
        font-weight: bold; /* Bold font weight */
        margin-bottom: 20px; /* Add margin below the heading */
    }
    /* Disable pointer events on active form */
    #toggle-login.active, #toggle-signup.active {
        pointer-events: none;
    }
</style>


</head>
<body>
    <div class="signup-container">
        
    <div class="card__back">
                <h1 class="heading-secondary">RealRoots</h1>
                <h3 style="text-align: center" class="heading-secondary">Where Dreams find Home</h2>
                <h2 style="text-align: center" class="heading-secondary">Admin Login</h2>
                <form method="post" class="form">
                    <!-- Signup form fields here -->
                     <!-- Signup form fields here -->
                    <!-- Login form fields here -->
                    <div class="form__group">
                        <input
                            type="email"
                            class="form__input"
                            placeholder="Email Address"
                            name="email"
                            required
                        />
                    </div>
                    <div class="form__group">
                        <input
                            type="password"
                            class="form__input"
                            placeholder="Password"
                            name="password"
                            required
                        />
                    </div>
                    <button type="submit" class="btn btn--green" name="adminlogin">Login</button>
                </form>
                <p style="background-color: white" class="card__toggle">';echo"Don't have an account? ";echo'<span id="toggle-signup">Sign Up</span></p>
                <br>
                
            
        
    </div>
</body>
</html>';
?>

