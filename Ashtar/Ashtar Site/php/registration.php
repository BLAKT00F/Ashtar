<?php

session_start();


$con = mysqli_connect(' ki12001220@localhost','ki12001220','Starseed35');

mysqi_select_db($con, 'ki12001220_ashtarplay');

$name = $_POST['Username'];
$email = $_POST['email'];
$pass = $_POST['password'];

$s = " select * from Player where name = '$Player'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "Username Already Taken";
}else{
    $reg= "insert into Player(username, email, password) values ('$username' , '$email' , '$password')";
    mysqi_query($con, $reg);
    echo "Registration Successful";
}
?>