<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
     require_once '../db/connector.php';
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "SELECT * FROM users_table WHERE id='$id' ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['read'] = array();

    if( mysqli_num_rows($response) === 1 ) {
        
        if ($row = mysqli_fetch_assoc($response)) {
 
             $h['name']        = $row['name'] ;
             $h['email']       = $row['email'] ;
 
             array_push($result["read"], $h);
 
             $result["success"] = "1";
             echo json_encode($result);
        }
 
   }
 else {
 
     $result["success"] = "0";
     $result["message"] = "Error!";
     echo json_encode($result);
 
     mysqli_close($conn);
 }
}