<?php
/*
*Author TheOnlySmartBoy<o2jose43@gmail.com>
*/
require '../db/connector.php';
$email = mysqli_real_escape_string($_POST["email"]);
$pass = mysqli_real_escape_string($_POST["password"]);
$query ="SELECT * FROM tbl_users WHERE email= '$email' AND password = '$pass'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)>0){
    echo 'Login Successfull';
}
else{
    echo 'Login Failed';
}
