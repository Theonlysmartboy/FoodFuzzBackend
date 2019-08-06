<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../db/connector.php';
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $pass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_orders (name, email, tel, password) VALUES ('$name', '$email', '$tel', '$pass')";

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