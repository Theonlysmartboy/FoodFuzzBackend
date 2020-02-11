<?php
require_once '../../db/connector.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT id, r_name as name, logo FROM `restaurants`";
    $response = mysqli_query($conn, $sql);
    $result = array();
    $result['restaurant'] = array();
    if (mysqli_num_rows($response) > 0) {
         while($row = mysqli_fetch_assoc($response)){
        $index['name'] = $row['name'];
        $index['image'] = $row['logo'];
        $index['id'] = $row['id'];
        array_push($result['restaurant'], $index);
        $result['success'] = "1";
        $result['message'] = "success";
         }
        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result['success'] = "0";
        $result['message'] = "error";
        echo json_encode($result);
        mysqli_close($conn);
    }
}