<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
 require_once '../db/connector.php';
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $photo = mysqli_real_escape_string($conn, $_POST['photo']);

    $path = "profile_image/$id.jpeg";
    $finalPath = "http://192.168.1.104/foodfuzzbackend/".$path;

    $sql = "UPDATE users_table SET photo='$finalPath' WHERE id='$id' ";

    if (mysqli_query($conn, $sql)) {
        
        if ( file_put_contents( $path, base64_decode($photo) ) ) {
            
            $result['success'] = "1";
            $result['message'] = "success";

            echo json_encode($result);
            mysqli_close($conn);

        }

    }

}