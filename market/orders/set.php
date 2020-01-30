<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../../db/connector.php';
    $orderId = mysqli_real_escape_string($conn, $_POST['orderId']);
    $delivery_fee = mysqli_real_escape_string($conn, $_POST['delivery']);
    $totalAmt = mysqli_real_escape_string($conn, $_POST['total']);
    $status = 0;
    $sql = "INSERT INTO payments (orderid, delivery_fee, total, status) "
            . "VALUES ('$orderId', '$delivery_fee', '$totalAmt', '$status')";

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