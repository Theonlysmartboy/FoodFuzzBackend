<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../../db/connector.php';
    $orderId = mysqli_real_escape_string($conn, $_POST['orderId']);
    $confCode = mysqli_real_escape_string($conn, $_POST['code']);
    $status = 1;
    $sql = " UPDATE tutorials_tbl SET tutorial_title = 'Learning JAVA' WHERE tutorial_id = 3";

    if (mysqli_query($conn, $sql)) {
        $result["success"] = "1";
        $result["message"] = "success";
        echo json_encode($result);
        mysqli_close($conn);
    } else {

        $result["success"] = "0";
        $result["message"] = "An error occured ".mysqli_error(connection);
        echo json_encode($result);
        mysqli_close($conn);
    }
} else {
    $result["success"] = "0";
    $result["message"] = "error";
    echo json_encode($result);
    mysqli_close($conn);
}