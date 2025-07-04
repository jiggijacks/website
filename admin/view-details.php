<?php
include 'header.php';
include '../db.php';

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
        $carrier = $row['carrier'];
        $carrier_ref = $row['carrier_ref'];
        $weight = $row['weight'];
        $payment_mode = $row['payment_mode'];
        $ship_mode = $row['ship_mode'];
        $quantity = $row['quantity'];
        $delivery_time = $row['delivery_time'];
        $image = $row['image'];
        $destination = $row['destination'];
    } else {
        echo "<script>window.location.href = 'dashboard.php'; </script>";
    }
} else {
    echo "<script>window.location.href = 'dashboard.php'; </script>";
}

?>


<div class="page-wrapper">
    <div class="page-content">
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
    </div>
</div>


<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body p-4">
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <img height="200" width="250" src="../uploads/<?php echo $image ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <div class="page-wrapper">
        <div class="page-content">
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-6 mx-auto">
                    <div class="card">
                        <div class="card-header px-4 py-3">
                            <h5 class="mb-0">Sender's Info</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="" class="form-label">Sender's Name</label>
                                    <p><?php echo $senders_name; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Sender's Contact</label>
                                    <p><?php echo $senders_contact; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Sender's Email</label>
                                    <p><?php echo $senders_mail; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Sender's Address</label>
                                    <p><?php echo $senders_address; ?></p>
                                </div>
                                <h4>Other Info</h4>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Status</label>
                                    <p><?php echo $statuss; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Dispatch Location</label>
                                    <p><?php echo $dispatch_l; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Carrier</label>
                                    <p><?php echo $carrier; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Carrier reference number</label>
                                    <p><?php echo $carrier_ref; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Weight(Add unit e.g KG)</label>
                                    <p><?php echo $weight; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Payment Mode</label>
                                    <p><?php echo $payment_mode; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Current Location</label>
                                    <p><?php echo $current_loc; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 mx-auto">
                    <div class="card">
                        <div class="card-header px-4 py-3">
                            <h5 class="mb-0">Receiver's Info</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="" class="form-label">Receiver's Name</label>
                                    <p><?php echo $receivers_name; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Receiver's Contact</label>
                                    <p><?php echo $receivers_contact; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Receiver's Email</label>
                                    <p><?php echo $receivers_mail; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Receiver's Address</label>
                                    <p><?php echo $receivers_address; ?></p>
                                </div>
                                <h4>Other Info</h4>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Destination</label>
                                    <p><?php echo $destination; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Package description</label>
                                    <p><?php echo $desc; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Dispatch Date</label>
                                    <p><?php echo $dispatchh; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Estimated Delivery Date</label>
                                    <p><?php echo $deliveryy; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Shipment mode</label>
                                    <p><?php echo $ship_mode; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Quantity</label>
                                    <p><?php echo $quantity; ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Delivery Time</label>
                                    <p><?php echo $delivery_time; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <?php
            include 'footer.php';
            ?>