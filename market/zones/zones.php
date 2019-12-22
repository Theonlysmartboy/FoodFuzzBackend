<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once '../../db/connector.php';
    $sql = "SELECT * FROM zones";
    $response = mysqli_query($conn, $sql);
    $result = array();
    $result['zone'] = array();
    if (mysqli_num_rows($response) >0) {
        while($row = mysqli_fetch_assoc($response)){
        $index['name'] = $row['zone_name'];
        $index['cost'] = $row['cost'];
        array_push($result['zone'], $index);
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