<?php
require_once '../../db/connector.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT products.id AS id, products.name, products.descr, products.image, products.cost, restaurants.r_name as restaurant, products.restaurant_id as seller FROM `products` INNER JOIN restaurants on products.restaurant_id = restaurants.id WHERE products.category_id = 2";
    $response = mysqli_query($conn, $sql);
    $result = array();
    $result['drink'] = array();
    if (mysqli_num_rows($response) > 0) {
         while($row = mysqli_fetch_assoc($response)){
        $index['name'] = $row['name'];
        $index['description'] = $row['descr'];
        $index['image'] = $row['image'];
        $index['cost'] = $row['cost'];
        $index['seller'] = $row['restaurant'];
        $index['sellerId'] = $row['seller'];
        $index['id'] = $row['id'];
        array_push($result['drink'], $index);
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