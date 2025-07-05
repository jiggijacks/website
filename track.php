<?php
include '../db.php';
include '../config.php';
if (isset($_POST['trackingsub'])) {
    $trackId = trim($_POST['trackId']);
    $select = mysqli_query($link, "SELECT * FROM tracking WHERE tracking_number = '$trackId' ");

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $senders_name = $row['sender_name'];
        $senders_contact = $row['sender_contact'];
        $senders_mail = $row['sender_email'];
        $senders_address = $row['sender_address'];
        $receivers_name = $row['receiver_name'];
        $receivers_contact = $row['receiver_contact'];
        $receivers_mail = $row['receiver_email'];
        $receivers_address = $row['receiver_address'];
        $statuss = $row['status'];
        $dispatch_l = $row['dispatch_location'];
        $dispatchh = $row['dispatch_date'];
        $deliveryy = $row['delivery_date'];
        $current_location = $row['current_location'];
        $desc = $row['pdesc'];
        $carrier = $row['carrier'];
        $carrier_ref = $row['carrier_ref'];
        $weight = $row['weight'];
        $payment_mode = $row['payment_mode'];
        $ship_mode = $row['ship_mode'];
        $quantity = $row['quantity'];
        $delivery_time = $row['delivery_time'];
        $date = $row['date'];
        $image = $row['image'];
        $destination = $row['destination'];
        $travel_progress = $row['travel_progress'];

        // Generate barcode URL
        $barcode_url = "https://barcode.tec-it.com/barcode.ashx?data=" . urlencode($trackId) . "&code=Code128";
    } else {
        echo "<script>alert('Invalid Tracking Number');window.location.href = 'track.php'; </script>";
    }
} else {
    // echo "<script>window.location.href = 'index.html'; </script>";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=1200">
    <link rel="shortcut icon" href="image/9S7FOuxJDpxpf3ebCt4rlWlbsLC45PQyPATzhxkt.png" type="image/x-icon">
    <!-- Title -->
    <title>Parecal Pro</title>
    <meta name="description" content="Airfright Express Company service all over the world">
    <meta name="author" content="Airfright Express">
    <meta name="keywords" content="Airfright ExpressCompany and Cargo Services Delivery Deliveries">
    <!-- Favicon -->
    
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>



    <!-- <div class="page-wrapper"> -->

    <div class="preloader"></div>

    <header class="main-header header-style-two">

        <div class="header-top" style="background-color: #fb7405;">
            <div class="inner-container">
                <div class="top-left">

                    <ul class="list-style-one light" style="margin-left: 50px; background-color:#fb7405;">
                        <li><i class="fa fa-map-marker-alt"></i> 380 St Kilda Road, Australia</li>
                        <li><i class="fa fa-clock"></i> Mon - Sat: 8am - 5pm</li>
                        <li><i class="fa fa-phone"></i> <a href="tel:92880087890">+92 (8800) 87890</a></li>
                    </ul>
                </div>
                <div class="top-right">
                    <ul class="feature-ilst">
                        <!-- <li><a href="#">Help</a></li> -->
                        <!-- <li><a href="#">Track Now</a></li> -->
                        <!-- <li><a href="#">Support</a></li> -->
                    </ul>
                </div>
            </div>
        </div>

        <div class="header-lower">

            <div class="main-box">
                <div class="logo-box">
                    <div class="logo"><a href="../index.html"><img src="../images/logo-3.png" width="200" alt="Logo" title="Lozics"></a>
                    </div>
                </div>

                <div class="nav-outer">
                    <nav class="nav main-menu">
                        <ul class="navigation">
                            <li><a href="../index.html">Home</a></li>

                            <li><a href="../about.html">About</a></li>

                            <li><a href="../services.html">Services</a></li>


                            <li><a href="../contact.html">Contact</a></li>

                            <li><a href="track.php">Track & Trace</a></li>

                        </ul>
                    </nav>
                </div>
                
                 <style>
                    .mobile-nav-toggler {
                        cursor: pointer;
                    }
                </style>


                <div class="outer-box">

                    <div class="btn-box">
                        <a href="track.php" class="theme-btn btn-style-one orange-bg"><span class="btn-title">Track & Trace</span></a>
                    </div>

                    <div class="mobile-nav-toggler"><span class="icon fas fa-arrow-left"></span></div>
                </div>
            </div>
        </div>
        
        

        <div class="mobile-menu">
            <div class="menu-backdrop"></div>

            <nav class="menu-box">
                <div class="upper-box">
                    <div class="nav-logo"><a href="index.html"><img src="images/logo-3.png" alt="Logo" title="Lozics"></a></div>
                    <div class="close-btn"><i class="icon fa fa-times"></i></div>
                </div>
                <ul class="navigation clearfix">

                </ul>
                <ul class="contact-list-one">
                    <li>
                        <i class="icon lnr-icon-phone-handset"></i>
                        <span class="title">Call Now</span>
                        <div class="text"><a href="tel:+92880098670">+92 (8800) - 98670</a></div>
                    </li>
                    <li>
                        <i class="icon lnr-icon-envelope1"></i>
                        <span class="title">Send Email</span>
                        <div class="text"><a href="mailto:parcelpro@gmail.com">parcelpro@gmail.com</a></span></a>
                        </div>
                    </li>
                    <li>
                        <i class="icon lnr-icon-map-marker"></i>
                        <span class="title">Address</span>
                        <div class="text">66 Broklyant, New York India 3269</div>
                    </li>
                </ul>
                <ul class="social-links">
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </nav>
        </div>




        <div class="sticky-header">
            <div class="auto-container">
                <div class="inner-container">

                    <div class="logo">
                        <a href="index.html"><img src="../images/logo-3.png" width="200" height="300" alt="Logo" title="Lozics"></a>
                    </div>

                    <div class="nav-outer">

                        <nav class="main-menu">
                            <div class="navbar-collapse show collapse clearfix">
                                <ul class="navigation clearfix">

                                </ul>
                            </div>
                        </nav>

                        <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section class="page-title" style="background-image: url(../images/background/page-title-bg.jpg);">
        <div class="auto-container">
            <div class="title-outer text-center">
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Track & Trace</li>
                </ul>
                <h1 class="title">Track & Trace</h1>
            </div>
        </div>
    </section>
    </div>



    <section class="subscribe-section p-0">
        <div class="auto-container">
            <div class="outer-box wow fadeInLeft">
                <div class="icon-arrow-2"></div>
                <div class="icon-block"></div>
                <div class="title-box">
                    <h3 class="title">Track & Trace</h3>
                </div>
                <div class="subscribe-form">
                    <form action="track.php" method="POST">
                        <div class="row">
                            <div class="form-group col-lg-10 col-md-10">
                                <div class="input-outer">
                                    <i class="icon fal fa-user"></i>
                                    <input type="text" name="trackId" placeholder="Your Tracking ID Now" required>
                                </div>
                            </div>

                            <div class="form-group col-lg-2 col-md-2">
                                <button class="theme-btn btn-style-one" name="trackingsub" style="background-color: #fb7405;"><span class="btn-title">Track
                                        Order</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
        <script>
        document.querySelector('.mobile-nav-toggler').addEventListener('click', function() {
            window.history.back();
        });
    </script>


    <?php
    if (isset($_POST['trackingsub'])) {
    ?>






        <!-- ##### Post Details Area Start ##### -->
        <section class="post-news-area section-padding-100-0 container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center mb-100">
                        <div class="line"></div>
                        <h2>Tracking Result</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div id='track_page' class=''>
                        <div id='track_details_wrapper'>
                            <h5 class='track_headings'>A consignment was sent to you through Airfright Express Logistics and
                                Shipping Company We recommend that you regularly keep track of your freight through our
                                tracking system here. Feel free to contact us through our email in the contact page if you
                                need any assistance of whatsoever kind.</h5>

                            <h3 class='track_subheadings' style='text-align: center;'>Your consignment details are stated
                                below</h3>

                            <center>

                                <?php if (isset($trackId)) : ?>
                                    <img src="<?php echo $barcode_url; ?>" alt="Barcode for <?php echo htmlspecialchars($trackId); ?>">
                                <?php endif; ?>

                            </center>
                            <center><img src=" https://airfrightexpress.com/temp/custom2/tracking-search.png" /></center>


                            <?php
                            if ($allow_print == "Yes") {
                            ?>
                                <center><a href="../invoice/receipt.php?tnum=<?php echo $trackId ?>" class="btn btn-primary">Print Receipt</a></center>
                            <?php } ?>




                            <?php
                            if ($show_map == "Yes") {
                            ?>
                                <!--Map Outer-->
                                <div class="row d-flex align-items-stretch">
                                    <div class="col-md-12 col-lg-12 col-xl-12 ">
                                        <iframe class="map" src="https://maps.google.com/maps?q=<?php echo $current_location == "" ? $dispatch_l : $current_location ?>&amp;t=k&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" style="border:0; width: 100%; height: 527px;"></iframe>
                                    </div>
                                </div>
                            <?php } ?>



                            <style>
                                table {
                                    border-collapse: collapse;
                                    border-spacing: 0;
                                    width: 100%;
                                    border: 1px solid #ddd;
                                }

                                th,
                                td {
                                    text-align: left;
                                    padding: 8px;
                                    color: white;

                                }

                                tr:nth-child(even) {
                                    background-color: #da0b06;
                                }
                            </style>


                            <h4>Receiver's Details</h4>


                            <div style="overflow-x:auto;">
                                <table>
                                    <tr style="background-color: #1b2142;">
                                        <th>Full Name</th>
                                        <th>Address</th>
                                        <th>Email Address</th>
                                        <th>Phone Number</th>

                                    </tr>
                                    <tr>
                                        <td> <?php echo $receivers_name ?> </td>
                                        <td><?php echo $receivers_address ?></td>
                                        <td><?php echo $receivers_mail ?> </td>
                                        <td> <?php echo $receivers_contact ?> </td>
                                    </tr>
                                </table>
                            </div>


                            <h4>Sender's Details</h4>
                            <div style="overflow-x:auto;">
                                <table>
                                    <tr style="background-color: #1b2142;">
                                        <th>Sender's Name</th>
                                        <th>Address</th>
                                        <th>Email Address</th>
                                        <th>Phone Number</th>
                                    </tr>
                                    <tr>
                                        <td> <?php echo $senders_name ?> </td>
                                        <td> <?php echo $senders_address ?> </td>
                                        <td><?php echo $senders_mail ?></td>
                                        <td> <?php echo $senders_contact ?> </td>
                                    </tr>
                                </table>
                            </div>
                            <h4>Consignment's Details</h4>
                            <div style="overflow-x:auto;">
                                <table>
                                    <tr style="background-color: #1b2142;">
                                        <th>Consignment No</th>
                                        <th>Package Weight</th>
                                        <th>Tracking Number</th>
                                        <th>Status</th>
                                        <th>Carrier</th>
                                        <th>Delivery Mode</th>
                                        <!-- <th>Delivery Completion</th> -->
                                    </tr>
                                    <tr>
                                        <td><?php echo $trackId ?></td>
                                        <td> <?php echo $weight ?> </td>
                                        <td> <?php echo $trackId ?></td>
                                        <td><?php echo $statuss ?></td>
                                        <td><?php echo $carrier ?></td>
                                        <td><?php echo $ship_mode ?></td>
                                        <!-- <td>32% Complete</td> -->

                                    </tr>
                                </table>
                            </div>
                            <hr>
                            <div style="overflow-x:auto;">
                                <table>
                                    <tr style="background-color: #1b2142;">
                                        <th>Origin</th>
                                        <th>Destination</th>
                                        <th>Pickup Time/Date</th>
                                        <th>Date of Departure</th>
                                        <th>Shipment Description</th>
                                        <th>Expected delivery date</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $dispatch_l ?></td>
                                        <td><?php echo $destination ?> </td>
                                        <td>   <?php echo $date ?></td>
                                        <td><?php echo $dispatchh ?></td>
                                        <td><?php echo $destination ?></td>
                                        <td><?php echo $deliveryy ?></td>
                                    </tr>
                                </table>
                            </div>
                            <hr>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <style>
                                #trackline_wrap {
                                    margin: 50px 5px;
                                    width: 95%;
                                }

                                #trackline_wrap #grey_line {
                                    width: 100%;
                                    height: 5px;
                                    background-color: #cc0000;
                                    position: relative;
                                }

                                #trackline_wrap #grey_line #startpoint,
                                #trackline_wrap #grey_line #endpoint {
                                    width: 19px;
                                    height: 19px;
                                    border-radius: 50%;
                                    background-color: #129518;
                                    position: absolute;
                                    top: -7px;
                                }

                                #trackline_wrap #grey_line #startpoint {
                                    left: -3px;
                                }

                                #trackline_wrap #grey_line #endpoint {
                                    right: -3px;
                                }

                                #trackline_wrap #grey_line #movingline {
                                    height: 5px;
                                    width: 0%;
                                    background-color: #129518;
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                }

                                #trackline_wrap #grey_line #pointer_img {
                                    position: absolute;
                                    top: -13px;
                                }

                                #trackline_wrap #grey_line #perc_count {
                                    background-color: #129518;
                                    padding: 5px;
                                    color: #fff;
                                    margin-left: -7px;
                                    margin-top: -10px;
                                }
                            </style>
                            </head>

                            <body>
                                <div id='trackline_wrap'>
                                    <div id='grey_line'>
                                        <div id='startpoint'></div>
                                        <div id='endpoint'></div>
                                        <div id='movingline'></div>
                                        <div id='pointer_img'>
                                            <img src='image/pointer2.png' />
                                            <span id="perc_count"><?php echo $travel_progress; ?>%</span>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        var travelProgress = 0;
                                        var targetProgress = <?php echo $travel_progress; ?>;
                                        var animationDuration = 5000;

                                        function resetProgress() {
                                            travelProgress = 0;
                                            $("#movingline").css('width', '0%');
                                            $("#perc_count").text('0%');
                                            $("#pointer_img").css('left', '0%');
                                            updateProgress();
                                        }

                                        function updateProgress() {
                                            var step = (targetProgress - travelProgress) / (animationDuration / 50);

                                            $("#movingline").css('width', travelProgress + '%');
                                            $("#perc_count").text(travelProgress + "%");
                                            $("#pointer_img").css('left', travelProgress + '%');

                                            if (travelProgress >= targetProgress) {
                                                clearInterval(interval);
                                                setTimeout(resetProgress, 1000); // Wait for 1 second before resetting
                                            } else {
                                                travelProgress += 1;
                                            }
                                        }

                                       
                                        function startAnimation() {
                                            clearInterval(interval); // Clear any existing intervals
                                            travelProgress = 0; // Reset travel progress to 0
                                            interval = window.setInterval(updateProgress, 80);
                                        }

                                        var interval = window.setInterval(updateProgress, 50);

                                     
                                        setInterval(startAnimation, animationDuration + 1000); // Reset and start again every animationDuration + 1 second
                                    });
                                </script>                             
                  
                            </body>
                            <hr>
                            <div style="overflow-x:auto;">
                                <table>
                                    <caption>Tracking Informations</caption>

                                    <tr style="background-color: #1b2142;">
                                        <th>Status</th>
                                        <th>Current Location</th>
                                        <th>Arrival Country</th>
                                        <th>Arrival Date</th>
                                        <th>Comments</th>
                                    </tr>
                                    <?php
                                    $selects = mysqli_query($link, "SELECT * FROM  track_update WHERE  track_num = '$trackId' ");
                                    if (mysqli_num_rows($selects) > 0) {
                                        while ($rows = mysqli_fetch_assoc($selects)) {
                                    ?>
                                            <tr style="background-color: #da0b06;">
                                                <td class="track_dot display-5  " style='font-size: 17px;'>
                                                    <?php echo $rows['status'] ?>
                                                </td>
                                                <td class="display-5" style='font-size: 17px;'> <?php echo $rows['current_location'] ?></td>
                                                <td class=" display-5 " style='font-size: 17px;'> <?php echo $dispatch_l ?></td>
                                                <td class=" display-5" style='font-size: 17px;'><?php echo $dispatchh ?></td>

                                                <td class=" display-5" style='font-size: 17px;'><b><?php echo $rows['note'] ?></b></td>
                                        <?php }
                                    } ?>
                                </table>
                            </div>


                        </div>
                        <br />
                        <br />


                        <div id='vert_scroll_wrap' style="background-color: #1b2142;">
                            <p>Thanks for patronising us. Feel free to track your package anytime.</p>
                        </div>

                    </div>


                </div>
            </div>
            </div>

            </div>
            </div>
            </div>
            </div>
        </section>
        <!-- ##### FAQ Area End ###### -->


    <?php } ?>

    <footer class="main-footer footer-style-one">
        <div class="bg bg-image" style="background-image: url(images/background/4.jpg);"></div>

        <div class="footer-top">
            <div class="auto-container">
                <div class="outer-box">
                    <ul class="contact-list-two light">
                        <li>
                            <i class="icon flaticon-global-shipping-1"></i>
                            <div class="text">Address <br /> <span>30 St Kilda Road, Jackson <br />Store,
                                    Australia</span></div>
                        </li>
                        <li>
                            <i class="icon flaticon-stock-1"></i>
                            <div class="text">Contact <br /> <a href="mailto:parcelpro@gmail.com">parcelpro@gmail.com</a></span></a>
                                <a href="tel:+92880048720">+92 (8800) 48720</a>
                            </div>
                        </li>
                        <li>
                            <i class="icon flaticon-24-hours-2"></i>
                            <div class="text">Timing <br /> <span>Mon - Sat: 8 am - 5 pm, <br />Sunday:
                                    CLOSED</span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="widgets-section">
            <div class="auto-container">
                <div class="row">

                    <div class="footer-column col-lg-3 col-sm-6">
                        <div class="footer-widget about-widget">
                            <div class="logo"><a href="#"><img src="../images/logo-3.png" alt="Logo"></a></div>
                            <div class="text">We work with a passion of taking challenges and creating new ones in
                                advertising sector.</div>
                            <a href="about.html" class="theme-btn btn-style-one" style="background-color: #fb7405;"><span class="btn-title">About
                                    Us</span></a>
                        </div>
                    </div>

                    <div class="footer-column col-lg-3 col-sm-6">
                        <div class="footer-widget links-widget">
                            <h4 class="widget-title">Service</h4>
                            <div class="widget-content">
                                <ul class="user-links">
                                    <li><i class="icon fa fa-angle-double-right"></i> <a href="#">Reliability &
                                            Punctuality</a></li>
                                    <li><i class="icon fa fa-angle-double-right"></i> <a href="#">Trusted
                                            Franchise</a></li>
                                    <li><i class="icon fa fa-angle-double-right"></i> <a href="#">Warehoues
                                            Storage</a></li>
                                    <li><i class="icon fa fa-angle-double-right"></i> <a href="#">Real Time
                                            Tracking</a></li>
                                    <li><i class="icon fa fa-angle-double-right"></i> <a href="#">Transparent
                                            Pricing</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="footer-column col-lg-3 col-sm-6">
                        <div class="footer-widget gallery-widget">
                            <h4 class="widget-title">Projects</h4>
                            <div class="widget-content">
                                <div class="insta-gallery">
                                    <figure class="image"><a href="#"><img src="../images/resource/gallery-thumb-1.jpg" alt="Image"></a></figure>
                                    <figure class="image"><a href="#"><img src="../images/resource/gallery-thumb-2.jpg" alt="Image"></a></figure>
                                    <figure class="image"><a href="#"><img src="../images/resource/gallery-thumb-3.jpg" alt="Image"></a></figure>
                                    <figure class="image"><a href="#"><img src="../images/resource/gallery-thumb-4.jpg" alt="Image"></a></figure>
                                    <figure class="image"><a href="#"><img src="../images/resource/gallery-thumb-5.jpg" alt="Image"></a></figure>
                                    <figure class="image"><a href="#"><img src="../images/resource/gallery-thumb-6.jpg" alt="Image"></a></figure>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-column col-lg-3 col-sm-6">
                        <div class="footer-widget newsletter-widget">
                            <h4 class="widget-title">Newsletter</h4>
                            <div class="text">Subscribe our newsletter to get our latest update & news</div>

                            <div class="newsletter-form">
                                <div class="form-group">
                                    <input type="email" name="Email" placeholder="Email....." required>
                                    <button type="submit" style="background-color: #fb7405;" class="form-btn"><i class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>

    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>
<script src="//code.tidio.co/ggsggsgggg.js" async></script>

</html>