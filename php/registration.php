<?php

session_start();


$con = mysqli_connect(' ki12001220@localhost','ki12001220','Starseed35');

mysqi_select_db($con, 'ki12001220_ashtarplay');

$user = $_POST['Username'];
$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM `Player`";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "Username Already Taken";
}else{
    $reg= "insert into Player(Username, email, password) values ('$user' , '$email' , '$pass')";
    mysqi_query($con, $reg);
    echo "Registration Successful";
}
?>