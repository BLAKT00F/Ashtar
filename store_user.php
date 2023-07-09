<?php
session_start();

// $con = mysqli_connect('localhost', 'root', '');

// mysqli_select_db($con, 'ashtar');

$con = mysqli_connect(' localhost','root');

mysqli_select_db($con, 'ki12001220_ashtarplay');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['user'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Check if username or email already exists
    $stmt = $con->prepare("SELECT * FROM player WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username or email already exists, display an error message
        echo "Username or email already exists";
        echo '<p><a href="index.html">Create Account</a></p>';
    } else {
        // Insert the new user
        $insertStmt = $con->prepare("INSERT INTO player (username, email, password) VALUES (?, ?, ?)");
        $insertStmt->bind_param("sss", $username, $email, $password);
        $insertStmt->execute();

        if ($insertStmt->affected_rows === 1) {
            // User registration successful, redirect to login page
            echo "User registration successful"; 
            // redirect to login page
            echo '<p><a href="index.html">Back To Login</a></p>';
            exit();
        } else {
            // Registration failed, display an error message
            echo "Error registering user";
        }

        $insertStmt->close();
    }

    $stmt->close();
}
?>
