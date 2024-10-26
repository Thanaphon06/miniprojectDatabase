<?php
// Include the database connection file
require 'database.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the username and password from the form
    $username = $_POST['logusername'];
    $password = $_POST['logpassword']; // รหัสผ่านที่กรอกมา

    // Prepare the SQL query to search for the user in the database
    $query = "SELECT * FROM ulogin WHERE logusername = ?";
    
    // Initialize a prepared statement
    if ($stmt = $mysqli->prepare($query)) {
        // Bind the parameters (s means string)
        $stmt->bind_param("s", $username);
        
        // Execute the query
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        
        // Check if the user exists
        if ($result->num_rows == 1) {
            // Fetch the user's data
            $user = $result->fetch_assoc();
            
            // Verify the password by comparing plain text
            if ($password === $user['logpassword']) { // เปรียบเทียบรหัสผ่านแบบ plain text
                // Password is correct
                echo "Login successful! Redirecting...";
                header("Location: dashboard.html");
                exit();
            } else {
                // Password is incorrect
                echo "Incorrect password!";
            }
        } else {
            // Username not found
            echo "Username not found!";
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$mysqli->close();
?>
