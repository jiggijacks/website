<?php
session_start();
include '../db.php';
$error = "";

$username = $password = "";

   if (isset($_POST['login'])) {
        
         if (empty($_POST["username"])) {
            $error = "Input your username";
          } else {
            $username = trim($_POST["username"]);
        }
          
          if (empty($_POST["password"])) {
            $error = "Input your admin password";
          } else {
            $password = trim($_POST["password"]);
          }

        if($username == "" || $password == ""){
            $error = "username or Password fields cannot be empty!";
        }else{
            $sql = mysqli_query($link, "SELECT id, username, password FROM admin WHERE username='$username' AND password= '$password'");
            if(mysqli_num_rows($sql) > 0){
                $data = mysqli_fetch_assoc($sql);
                $_SESSION['ADMIN_LOGIN'] = $data['username'];
                $_SESSION['adminid'] = $data['id'];

                echo "<script>
                        window.location.href = 'dashboard.php';
                </script>";
            }else{
                $error = "Invalid username and Password";
            }
        }
    }

// function test_input($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }
?>


<!doctype html>
<html lang="en" class="semi-dark">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <title></title>
</head>
<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="mb-3 text-center">
                                        <img src="assets/images/logo-icon.png" width="60" alt="" />
                                    </div>
                                    <div class="text-center mb-4">
                                        <!-- <h5 class="">Dashrock Admin</h5> -->
                                        <p class="mb-0">Please log in to your account</p>
                                    </div>
                                    <div class="form-body">
                                        <?php if ($error != "") { ?>
                                            <div class="alert alert-danger"><?php echo $error ?></div>
                                        <?php } ?>
                                        <form class="row g-3" action="" method="POST">
                                            <div class="col-12">
                                                <label for="email" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="" placeholder="username" name="username">
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group" id="">
                                                    <input type="password" class="form-control border-end-0" id="password" value="" name="password" placeholder="Enter Password">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" name="login" class="btn btn-primary">Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <!-- <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr

	<script src="assets/js/app.js"></script>
</body>


<! Mirrored from codervent.com/gum/dashrock/demo/ltr/auth-basic-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jun 2024 11:00:00 GMT -->

</html>