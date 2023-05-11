<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // validate form input
  $username = test_input($_POST["username"]);
  $email = test_input($_POST["email"]);
  $wallet_address = test_input($_POST["wallet_address"]);
  $password = test_input($_POST["password"]);
  $password_repeat = test_input($_POST["password_repeat"]);

  $errors = [];

  if (empty($username)) {
    $errors["username"] = "Username is required";
  }

  if (empty($email)) {
    $errors["email"] = "Email is required";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Invalid email format";
  }

  if (empty($wallet_address)) {
    $errors["wallet_address"] = "Wallet address is required";
  }

  if (empty($password)) {
    $errors["password"] = "Password is required";
  } elseif (strlen($password) < 8) {
    $errors["password"] = "Password must be at least 8 characters";
  }

  if (empty($password_repeat)) {
    $errors["password_repeat"] = "Please confirm your password";
  } elseif ($password !== $password_repeat) {
    $errors["password_repeat"] = "Passwords do not match";
  }

  if (count($errors) === 0) {
    // process form submission
    // you can insert data into your database or do other things here
    // and then redirect the user to a success page or do something else
    // for example:
    header("Location: success.php");
    exit();
  }
}

// test_input function to sanitize user input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>