<?php

session_start();


$con = mysqli_connect('localhost','ki12001220','Starseed35');

mysqi_select_db($con, 'ki12001220_ashtarplay');

$name = $_POST['user'];
$name = $_POST['email'];
$name = $_POST['password'];

$s = " select * from usertable where name = '$Player'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "Username Already Taken";
}else{
    $reg= "insert into usertable(name, email, password) values ('$name' , '$email' , '$password')";
    mysqi_query($con, $reg);
    echo "Registration Successful";
}
?>