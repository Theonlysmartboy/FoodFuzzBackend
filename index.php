<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'db/connector.php';
    session_start();
    $email = mysqli_real_escape_string($conn, $_POST['uemail']);
    $password = mysqli_real_escape_string($conn, $_POST['upwd']);

    $sql = "SELECT * FROM tbl_users WHERE email='$email' ";

    $response = mysqli_query($conn, $sql);
    if (mysqli_num_rows($response) === 1) {

        $row = mysqli_fetch_assoc($response);

        if (password_verify($password, $row['password'])) {

            $index['name'] = $row['name'];
            $index['email'] = $row['email'];
            $index['id'] = $row['id'];


            mysqli_close($conn);
        } else {
            echo '<script type="text/javascript">
                window.alert("Password is invalid please try again!")
               </script>';

            mysqli_close($conn);
        }
    } else {
        echo '<script type="text/javascript">
                window.alert("Username is invalid please try again!")
               </script>';
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Purple Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="dashboard/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="dashboard/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- inject:css -->
        <link rel="stylesheet" href="dashboard/css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="dashboard/images/favicon.png" />
    </head>

    <body>
        <div class="container-fluid">
            <div class="main-panel">        
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            Login
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Login</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Food Fuzz back-end</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-3 grid-margin stretch-card"></div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Login form</h4>
                                    <p class="card-description">
                                        Enter your details bellow
                                    </p>
                                    <form class="forms-sample" action="" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input name="uemail" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input name="upwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                Remember me
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary mr-2">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 grid-margin stretch-card"></div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="https://www.foodfuzz.com/" target="_blank">Food Fuzz</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Designed & developed by <a href="https:otemainc.com" target="_blank">Otema Technologies</a></span>
                    </div>
                </footer>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="dashboard/vendors/js/vendor.bundle.base.js"></script>
        <script src="dashboard/vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="dashboard/js/off-canvas.js"></script>
        <script src="dashboard/js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="dashboard/js/file-upload.js"></script>
        <!-- End custom js for this page-->
    </body>
</html>