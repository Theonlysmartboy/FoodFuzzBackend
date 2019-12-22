<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../../db/connector.php';
    $orderId = mysqli_real_escape_string($conn, $_POST['orderId']);
    $client = mysqli_real_escape_string($conn, $_POST['client']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $seller = mysqli_real_escape_string($conn, $_POST['seller']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $status = 1;
    $sql = "INSERT INTO orders (orderid, client, product, seller, amount, "
            . "quantity, longitude, latitude, deliveryloc, status) "
            . "VALUES ('$orderId', '$client', '$name', '$seller', '$amount', "
            . "'$quantity', '$longitude', '$latitude', '$location', '$status')";

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
} else {
    $result["success"] = "0";
    $result["message"] = "error";
    echo json_encode($result);
    mysqli_close($conn);
}