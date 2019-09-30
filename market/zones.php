<?php
require_once '../../db/connector.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * from tbl_zones ";
    $response = mysqli_query($conn, $sql);
    if (mysqli_num_rows($response) > 0) {
        while($e=mysqli_fetch_assoc($response)){
		$output[]=$e; 
		}	
		print(json_encode($output)); 
		$mysqli->close();	
        } 
}