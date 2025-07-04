<?php
include 'header.php';
$err = "";
$msg = "";
if (isset($_GET['num'])) {
    $tnumbs = $_GET['num'];
    $select = mysqli_query($link, "SELECT * FROM tracking WHERE tracking_number = '$tnumbs' ");
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
        $current_loc = $row['current_location'];
        $desc = $row['pdesc'];
        $travel_progresss = $row['travel_progress'];
    } else {
        echo  $err = "<script>window.location.href = 'dashboard.php'; </script>";
    }
} else {
    echo   $err = "<script>window.location.href = 'dashboard.php'; </script>";
}



if (isset($_POST['update'])) {
    $current_lo = text_input($_POST['current_loc']);
    $date = text_input($_POST['date']);
    $time = text_input($_POST['time']);
    $status = text_input($_POST['status']);
    $note = text_input($_POST['note']);
    $shiping_cost  = text_input($_POST['shiping_cost']);
    $clearance_cost = text_input($_POST['clearance_cost']);

    $travel_progress = text_input($_POST['travel_progress']);

    if ($travel_progress < 0) {
        echo  $err = "<script>alert('Travel progress can be less than 0%') </script>";
    } elseif ($travel_progress > 100) {
        echo   $err =  "<script>alert('Travel progress can be more than 100%') </script>";
    } else {
        $travel_progress = text_input($_POST['travel_progress']);
    }


    if (empty($err)) {

        $update = mysqli_query($link, "INSERT INTO track_update (`track_num`, `status`, `date`, `time`, `note`, `current_location`, shiping_cost, clearance_cost, travel_progress) VALUES ('$tnumbs', '$status', '$date', '$time', '$note', '$current_lo', '$shiping_cost', '$clearance_cost', '$travel_progress') ");
        if ($update) {
            mysqli_query($link, "UPDATE tracking SET current_location = '$current_lo', status = '$status',  travel_progress = '$travel_progress' WHERE tracking_number = '$tnumbs' ");

            if ($mail_track_update == "Yes") {
                $subject = "$sitename";
                $body = '
                <html>
                <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                </head>
                <body style="margin: 0; padding: 0; background-color: #f9fafb;">
                  <div style="background-color: #ffffff; padding: 24px; max-width: 400px; margin: 20px auto; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <div style="background: linear-gradient(to right, #6b46c1, #4299e1); padding: 16px; border-radius: 8px 8px 0 0; color: #ffffff; font-weight: 600; text-align: center;">
                     <p>SHIPMENT ORDER</p>
                    </div>
                    <div style="padding: 24px; text-align: center;">
            
                      <p style="text-align: left; color: #4a5568; margin-bottom: 16px;">Dear ' . $receivers_name . ',</p>
                      <p style="text-align: left; color: #4a5568; margin-bottom: 16px;">We are pleased to inform you that your shipment has been updated to <strong>' . $status . '</strong>.</p>
                      <p style="text-align: left; color: #4a5568; margin-bottom: 16px;"><strong>Tracking Information</strong></p>
                      <p style="text-align: left; color: #4a5568; margin-bottom: 16px;"><strong>Tracking Number: </strong>' . $tnumbs . '</p>
                      <p style="text-align: left; color: #4a5568; margin-bottom: 16px;"><strong>Status: </strong>' . $status . '</p>
                      <p style="text-align: left; color: #4a5568; margin-bottom: 16px;"><strong>Current Location: </strong>' . $current_lo . '</p>
                      <p style="text-align: left; color: #4a5568; margin-bottom: 16px;"><strong>Note: </strong>' . $note . '</p>
                      <p style="text-align: center; color: #4a5568; margin-bottom: 16px;"> <br> <a href="' . $site_url . '/track/track.php" style="display: inline-block; width: 100%; background: linear-gradient(to right, #6b46c1, #4299e1); color: #ffffff; font-weight: 600; padding: 8px 16px; border-radius: 8px; text-decoration: none;">Tracking Page</a></p>
                    </div>
                  </div>
                </body>
                </html>
                ';
                sendMail($receivers_mail, $subject, $body);
            }
        }
        echo "<script>
            alert('Updated Successfully');
	           window.location.href = 'edit-tracking.php?num=$tnumbs';
	          </script>";
        exit();
    }
}


function text_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <!-- <div class="breadcrumb-title pe-3">Forms</div> -->
            <div class="ps-3">
                <!-- <img src="assets/images/logo-3.png" alt=""> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Tracking</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->



        <div class="card">
            <div class="card-body p-4">
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <label style="font-weight: bold;font-size: 25px;">TRACKING NUMBER</label>
                        <input type="text" readonly="" value="<?php echo $tnumbs ?>" name="tracking_number" class="form-control" id="exampleInputUsername1" placeholder="Username">
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-header px-4 py-3">
                        <h5 class="mb-0">Sender's Info</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="edit-tracking.php?num=<?php echo $tnumbs ?>" class="forms-sample">
                            <div class="col-md-12">
                                <label for="" class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="Pending">Pending</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Picked Up">Picked Up</option>
                                    <option value="Arrived">Arrived</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Departed">Departed</option>
                                    <option value="On hold">On hold</option>
                                </select>
                            </div>



                            <div class="col-md-12">
                                <label for="" class="form-label">Update Travel Progress</label>
                                <input type="text" name="travel_progress" class="form-control" id="" placeholder="%" min="0" max="100" required>
                            </div>


                            <div class="col-md-12">
                                <label for="" class="form-label">Current Location</label>
                                <input type="text" name="current_loc" class="form-control" id="" placeholder="Current Location " required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Date</label>
                                <input type="date" class="form-control" value="" name="date" id="" placeholder="Date" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Time</label>
                                <input type="time" class="form-control" value="" name="time" id="" placeholder="" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Note</label>
                                <textarea name="note" class="form-control"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Shiping Cost</label>
                                <input type="text" class="form-control" value="" name="shiping_cost" id="" placeholder="">
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Clearance Cost</label>
                                <input type="text" class="form-control" value="" name="clearance_cost" id="" placeholder="">
                            </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" style="width:  100%;" name="update" class="btn btn-primary px-4">Submit</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>