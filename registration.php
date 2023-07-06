<?php

session_start();


// $con = mysqli_connect('localhost','ki12001220','Starseed35');

// $con = mysqli_connect('localhost','root','');


// mysqli_select_db($con, 'ashtar');

$con = mysqli_connect(' ki12001220@localhost','ki12001220','Starseed35');

mysqli_select_db($con, 'ki12001220_ashtarplay');


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['Username'];
    $password = $_POST['password'];
    

    // Prepare and execute the query
    $stmt = $con->prepare("SELECT * FROM player WHERE (username = ? OR email = ?) AND password = ?");
    $stmt->bind_param("sss", $username,$username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query returned a matching user
    if ($result->num_rows === 1) {
        // Redirect to the main page upon successful login
        header("Location: main.html");
        exit();
    } else {
        // Invalid username or password, display an error message
        echo "Invalid username or password";
        echo '<p><a href="index.html">Back To Login</a></p>';
    }

    $stmt->close();
}
?>
