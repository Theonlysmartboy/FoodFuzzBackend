<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../db/connector.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_users (name, email, password) VALUES ('$name', '$email', '$pass')";

    if (mysqli_query($conn, $sql)) {
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);
    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }
}