<?php
session_start();
include '../db.php';
include '../functions.php';
if (isset($_SESSION['ADMIN_LOGIN'])) {
    $username = $_SESSION['ADMIN_LOGIN'];
    $query = mysqli_query($link, "SELECT * FROM admin WHERE username = '$username' ");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $aemail = $row['username'];
        $apass = $row['password'];
        $id = $row['id'];
    }
} else {
    echo "<script>
        window.location.href = 'signin.php';
    </script>";
}
?>
<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="assets/css/dark-theme.css" />
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <link rel="stylesheet" href="assets/css/header-colors.css" />
    <title><?php echo $sitename ?></title>
    <style>
        .sidebar-wrapper.active {
            left: 0; /* Show the sidebar */
        }
        .sidebar-wrapper {
            left: -250px; /* Hide the sidebar initially */
            transition: left 0.3s;
        }

        @media (min-width: 768px) {
            .sidebar-wrapper {
                left: 0 !important; /* Always show sidebar on desktop */
            }

            .sidebar-wrapper.active {
                left: -250px; /* Hide sidebar on desktop when active */
            }

            .mobile-toggle-menu {
                display: none; /* Hide mobile toggle on desktop */
            }
        }
    </style>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="assets/images/logo-icons.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text"><?php echo $sitename ?></h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i></div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="dashboard.php">
                        <div class="parent-icon"><i class='bx bx-home-alt'></i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="add-tracking.php">
                        <div class="parent-icon"><i class='bx bx-add-to-queue'></i></div>
                        <div class="menu-title">Add Tracking</div>
                    </a>
                </li>
                <li class="menu-label">Settings</li>
                <li>
                    <a href="settings.php">
                        <div class="parent-icon"><i class='bx bxs-cog'></i></div>
                        <div class="menu-title">General Settings</div>
                    </a>
                </li>
                <li>
                    <a href="shipping_settings.php">
                        <div class="parent-icon"><i class='bx bxs-package'></i></div>
                        <div class="menu-title">Shipping Settings</div>
                    </a>
                </li>
                <li>
                    <a href="email-settings.php">
                        <div class="parent-icon"><i class='bx bx-envelope'></i></div>
                        <div class="menu-title">E-mail Settings</div>
                    </a>
                </li>
                <li class="menu-label">Account Settings</li>
                <li>
                    <a href="account.php">
                        <div class="parent-icon"><i class='bx bx-user'></i></div>
                        <div class="menu-title">Account</div>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <div class="parent-icon"><i class='bx bx-log-out'></i></div>
                        <div class="menu-title">Logout</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand gap-3">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
                    <div class="search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                        <a href="javascript:;" class="btn d-flex align-items-center"><i class='bx bx-search'></i>Search</a>
                    </div>
                    <div class="top-menu ms-auto">
                        <div class="user-box dropdown px-3">
                            <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!--<img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">-->
                                <div class="user-info">
                                    <p class="user-name mb-0">Admin</p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class="bx bx-log-out-circle"></i><span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->

        <!-- Required JS Libraries -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="assets/js/app.js"></script>

        <!-- Custom JS -->
        <script>
            $(document).ready(function() {
                console.log("Document ready");
                
                $('.toggle-icon').on('click', function() {
                    console.log("Toggle icon clicked");
                    $('.sidebar-wrapper').toggleClass('active');
                });
                
                $('.mobile-toggle-menu').on('click', function() {
                    console.log("Mobile toggle menu clicked");
                    $('.sidebar-wrapper').toggleClass('active');
                });
            });
        </script>
    </div>
</body>

</html>
