<?php

/*
*Author TheOnlySmartBoy<o2jose43@gmail.com>
*/
$database ="foodfuz_db";
$user ="Tosby";
$password ="MasterTosby2";
$port = "3309";
$host = "localhost";
$conn = mysqli_connect($host, $user, $password, $database, $port);
if(!$conn){
    echo mysqli_error($conn);
}


