<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../db/connector.php';
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    //create a new random password
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($p = 0; $p <= 8; $p++) {
        $password .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users_table SET  password='$pass' WHERE email='$email' ";
    if (mysqli_query($conn, $sql)) {
        //Reset successfull send email
        $to = $email;
        $subject = 'New password';
        $message = 'Please log in using the password:  ' . $pass . "\r\n" .
                'And proceed to set a new password for your account';
        $headers = 'From: noreply@foodfuzz.co.ke' . "\r\n" .
                'Reply-To: info@foodfuzz.co.ke' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        if (mail($to, $subject, $message, $headers)) {
            $response["error"] = FALSE;
            $result["message"] = "success";
            echo json_encode($result);
            mysqli_close($conn);
        } else {
            // Unable to send email
            $response["error"] = TRUE;
            $response["error_msg"] = "We are unable to process your request currently. Please try again later!";
            echo json_encode($response);
            mysqli_close($conn);
        }
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "The email is not found. Please try again!";
        echo json_encode($response);
        mysqli_close($conn);
    }
}

    