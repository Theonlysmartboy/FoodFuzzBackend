<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../db/connector.php';
    $id = mysqli_real_escape_string($conn, $_POST['Id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $pass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE tbl_users SET name='$name', email='$email', tel='$phone', password='$pass' WHERE id='$id' ";

    if (mysqli_query($conn, $sql)) {
        $response["error"] = FALSE;
        $response["message"] = "success";
        echo json_encode($response);
        mysqli_close($conn);
    }
} else {
    // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Unable to update data. Please try again!";
        echo json_encode($response);

    mysqli_close($conn);
}