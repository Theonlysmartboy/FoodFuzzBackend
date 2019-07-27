<?php
require_once '../../db/connector.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM view_products";
    $response = mysqli_query($conn, $sql);
    $result = array();
    $result['food'] = array();
    if (mysqli_num_rows($response) === 1) {
        $row = mysqli_fetch_assoc($response);
        $index['name'] = $row['name'];
        $index['description'] = $row['descr'];
        $index['image'] = $row['image'];
        $index['cost'] = $row['cost'];
        $index['seller'] = $row['restaurant'];
        $index['id'] = $row['id'];
        array_push($result['food'], $index);
        $result['success'] = "1";
        $result['message'] = "success";
        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result['success'] = "0";
        $result['message'] = "error";
        echo json_encode($result);
        mysqli_close($conn);
    }
}