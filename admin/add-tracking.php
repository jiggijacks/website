<?php
include 'header.php';

$tnumbs = "1234567890";
$tnumbs = str_shuffle($tnumbs);
$tnumbs = substr($tnumbs, 0, $track_num);
$tnumbs = $track_prefix . "-" . date('m') . "-" . $tnumbs;

$msg = "";

$sendersname = $senderscontact = $sendersmail = $sendersaddress = $receiversname = $receiverscontact = $receiversmail = $receiversaddress = $status = $dispatchl = $dispatch = $delivery = $desc = "";
$carrier = $carrier_ref = $weight = $payment_mode = $ship_mode = $quantity = $delivery_time = $err = $dest = "";

if (isset($_POST['submit'])) {
    $sendersname = text_input($_POST['sname']);
    $senderscontact = text_input($_POST['scontact']);
    $sendersmail = text_input($_POST['smail']);
    $sendersaddress = text_input($_POST['saddress']);
    $receiversname = text_input($_POST['rname']);
    $receiverscontact = text_input($_POST['rcontact']);
    $receiversmail = text_input($_POST['rmail']);
    $receiversaddress = text_input($_POST['raddress']);
    $status = text_input($_POST['status']);
    $dispatchl = text_input($_POST['dispatchl']);
    $dispatch = text_input($_POST['dispatch']);
    $delivery = text_input($_POST['delivery']);
    $desc = text_input($_POST['desc']);

    $carrier = text_input($_POST['carrier']);
    $carrier_ref = text_input($_POST['carrier_ref']);
    $weight = text_input($_POST['weight']);
    $payment_mode = text_input($_POST['payment_mode']);
    $ship_mode = text_input($_POST['ship_mode']);
    $quantity = text_input($_POST['quantity']);
    $delivery_time = text_input($_POST['delivery_time']);
    $dest = text_input($_POST['dest']);
    $travel_progress = text_input($_POST['travel_progress']);

    if ($travel_progress < 0) {
        echo "<script>alert('Travel progress can\'t be less than 0%')</script>";
    } elseif ($travel_progress > 100) {
        echo "<script>alert('Travel progress can\'t be more than 100%')</script>";
    } else {
        $travel_progress = text_input($_POST['travel_progress']);
    }

    if (isset($_FILES['image'])) {
        $imgname = $tnumbs . ".png";
        $dir = "../uploads/" . $imgname;
        
        $filename = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
          
        $extensions= array("jpeg","jpg","png");
          
        if(in_array($file_ext,$extensions)=== false){
            echo "<script>alert('extension not allowed, please choose a JPEG or PNG file.')</script>";
        }
          
    }else{
        echo "<script>alert('You didn\'t select an image')</script>";
    }

    if (empty($sendersname) || empty($senderscontact) || empty($sendersmail) || empty($sendersaddress) || empty($receiversname) || empty($receiverscontact) || empty($receiversmail) || empty($receiversaddress) || empty($status) || empty($dispatchl) || empty($dispatch) || empty($delivery) || empty($carrier) || empty($carrier_ref) || empty($weight) || empty($payment_mode) || empty($ship_mode) || empty($quantity) || empty($delivery_time) || empty($dest) || empty($travel_progress)) {
        echo "<script>alert('Check!!! Some fields are empty')</script>";
    }else {
            $insert = mysqli_query($link, "INSERT INTO tracking (tracking_number, sender_name, sender_contact, sender_email, sender_address, status, dispatch_location, receiver_email, receiver_name, receiver_contact, receiver_address, dispatch_date, delivery_date, pdesc, carrier, carrier_ref, weight, payment_mode, ship_mode, quantity, delivery_time, image, destination, travel_progress) VALUES ('$tnumbs', '$sendersname', '$senderscontact', '$sendersmail', '$sendersaddress', '$status', '$dispatchl', '$receiversmail', '$receiversname', '$receiverscontact', '$receiversaddress', '$dispatch', '$delivery', '$desc', '$carrier', '$carrier_ref', '$weight', '$payment_mode', '$ship_mode', '$quantity', '$delivery_time', '$imgname', '$dest', '$travel_progress')");
            if ($insert) {
                move_uploaded_file($tmp, $dir);
                if ($mail_track_update == "Yes") {
                    $subject = "$sitename";
                    $body = '
                    <html>
                    <head>
                      <meta charset="UTF-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1.0">
                      <style>
                        body {
                          font-family: Arial, sans-serif;
                        }
                        .container {
                          background-color: #ffffff;
                          padding: 24px;
                          max-width: 600px;
                          margin: 0 auto;
                          border-radius: 8px;
                          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        }
                        .header {
                          background: linear-gradient(to right, #6b46c1, #3182ce);
                          padding: 16px;
                          border-top-left-radius: 8px;
                          border-top-right-radius: 8px;
                          text-align: center;
                        }
                        .header img {
                          width: 170px;
                          margin: 0 auto;
                        }
                        .content {
                          padding: 24px;
                          text-align: center;
                        }
                        .button {
                          display: block;
                          width: 100%;
                          background: linear-gradient(to right, #6b46c1, #3182ce);
                          color: #ffffff !important;
                          font-weight: bold;
                          padding: 12px;
                          border-radius: 8px;
                          text-decoration: none;
                          margin-bottom: 24px;
                        }
                        .text-left {
                          text-align: left;
                          color: #4a5568;
                        }
                        .dark .text-left {
                          color: #a0aec0;
                        }
                      </style>
                    </head>
                    <body style="margin: 0; padding: 0; background-color: #f9fafb;">
                      <div class="container">
                        <div class="content">
                         <div style="background: linear-gradient(to right, #6b46c1, #4299e1); padding: 16px; border-radius: 8px 8px 0 0; color: #ffffff; font-weight: 600; text-align: center;">
                            <p>SHIPMENT ORDER</p>
                        </div>
                          <p class="text-left">Dear ' . $receiversname . ',</p>
                          <p class="text-left">We are pleased to inform you that your shipment has been registered with us at <strong>' . $sitename . '</strong>.</p>
                          <p class="text-left"><strong>Tracking Information: </strong>' . $tnumbs . '</p>
                          <p class="text-left"><strong>Package: </strong>' . $desc . '</p>
                          <p class="text-left"><strong>Status: </strong>' . $status . '</p>
                          <p class="text-left"><strong>Estimated Delivery Date: </strong>' . $delivery . '</p>
                          <p class="text-left"><strong>Dispatch Location: </strong>' . $dispatchl . '</p>
                         <p style="text-align: center; color: #4a5568; margin-bottom: 16px;"><br><a href="' . $site_url . '/track/track.php" style="display: inline-block; width: 100%; background: linear-gradient(to right, #6b46c1, #4299e1); color: #ffffff; font-weight: 600; padding: 8px 16px; border-radius: 8px; text-decoration: none;">Tracking Page</a></p>
                        </div>
                      </div>
                    </body>
                    </html>
                    ';
                    sendMail($receiversmail, $subject, $body);
                }
                echo "<script>
                    alert('New Tracking Added Successfully');
                    window.location.href = 'dashboard.php';
                  </script>";
            } else {
                echo mysqli_error($link);
            }
        
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
			<div class="col-xl-6 mx-auto">
				<div class="card">
					<div class="card-header px-4 py-3">
						<h5 class="mb-0">Sender's Info</h5>
					</div>
					<div class="card-body p-4">
						<form class="row g-3 needs-validation" method="POST" action="add-tracking.php" enctype="multipart/form-data">
							<div class="col-md-12">
								<label for="" class="form-label">Sender's Name</label>
								<input type="text" class="form-control" id="" placeholder="Sender's Name" name="sname" value="<?php echo $sendersname ?>">
							</div>
							<div class="col-md-12">
								<label for="" class="form-label">Sender's Contact</label>
								<input type="text" class="form-control" id="" placeholder="Sender's Contact" value="<?php echo $senderscontact ?>" name="scontact">
							</div> <br>
							<div class="col-md-12">
								<label for="" class="form-label">Sender's Email</label>
								<input type="text" class="form-control" name="smail" id="" placeholder="Sender's Email" value="<?php echo $sendersmail ?>">
							</div>

							<div class="col-md-12">
								<label for="" class="form-label">Sender's Address</label>
								<input type="text" class="form-control" name="saddress" id="" placeholder="Sender's Address" value="<?php echo $sendersaddress ?>">
							</div>
							<h4>Other Info</h4> <br> <br> <br>
							<div class="col-md-12">
								<label for="" class="form-label">Status</label>
								<select id="" class="form-select" name="status">
								    <option value="<?php echo $status ?>"><?php echo $status ?></option>
									<option value="Pending">Pending</option>
									<option value="Active">Active</option>
									<option value="Inactive">Inactive</option>
									<option value="Picked Up">Picked Up</option>
									<option value="Arrived">Arrived</option>
									<option value="Delivered">Delivered</option>
									<option value="On hold">On hold</option>
								</select>
							</div>

							<div class="col-md-12">
								<label for="" class="form-label">Dispatch Location</label>
								<input type="text" name="dispatchl" class="form-control" id="" placeholder="Origin Port" value="<?php echo $dispatchl ?>">
							</div>

							<div class="col-md-12">
								<label for="" class="form-label">Carrier</label>
								<input type="text" class="form-control" name="carrier" id="" placeholder="Carrier Ex- DHL" value="<?php echo $carrier ?>">
							</div>

							<div class="col-md-12">
								<label for="" class="form-label">Carrier reference number</label>
								<input type="text" class="form-control" name="carrier_ref" id="" placeholder="Carrier reference number Ex- 32423" value="<?php echo $carrier_ref ?>">
							</div>

							<div class="col-md-12">
								<label for="" class="form-label">Weight(Add unit e.g KG)</label>
								<input type="text" class="form-control" id="" placeholder="Weight" name="weight" value="<?php echo $weight ?>">

							</div>

							<div class="col-md-12">
								<label for="" class="form-label">Payment Mode</label>
								<input type="text" class="form-control" id="" placeholder="Payment" name="payment_mode" value="<?php echo $payment_mode ?>">
							</div>

							<div class="col-md-12">
								<label for="" class="form-label">Travel progress</label>
								<input type="text" name="travel_progress" class="form-control" value="1" placeholder="%" min="0" max="100" required value="<?php echo $travel_progress ?>">
							</div>


							<div class="col-md-12">
								<label for="" class="form-label">Package Image</label>
								<input type="file" class="form-control" id="" name="image">
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
						<div class="col-md-12">
							<label for="bsValidation1" class="form-label">Receiver's Name</label>
							<input type="text" class="form-control" id="" placeholder="Receiver's Name" value="<?php echo $receiversname ?>" name="rname">
						</div> <br>

						<div class="col-md-12">
							<label for="bsValidation2" class="form-label">Receiver's Contact</label>
							<input type="text" class="form-control" id="" placeholder="Receiver's Contact" value="<?php echo $receiverscontact ?>" name="rcontact">
						</div> <br>

						<div class="col-md-12">
							<label for="bsValidation3" class="form-label">Receiver's Email</label>
							<input type="email" class="form-control" id="" placeholder="Receiver's Email" name="rmail" value="<?php echo $receiversmail ?>">
						</div> <br>

						<div class="col-md-12">
							<label for="bsValidation4" class="form-label">Receiver's Address</label>
							<input type="text" class="form-control" id="" placeholder="Receiver Address" name="raddress" value="<?php echo $receiversaddress ?>">
						</div> <br>

						<h4>Other Info</h4>

						<div class="col-md-12">
							<label for="bsValidation5" class="form-label">Destination</label>
							<input type="text" class="form-control" name="dest" id="" placeholder="Destination" value="<?php echo $dest ?>">
						</div> <br>

						<div class="col-md-12">
							<label for="bsValidation5" class="form-label">Package description</label>
							<input type="text" class="form-control" name="desc" id="" placeholder="Package Description" value="<?php echo $desc ?>">
						</div> <br>



						<div class="col-md-12">
							<label for="bsValidation8" class="form-label">Dispatch Date</label>
							<input type="date" class="form-control" id="" name="dispatch" value="<?php echo $dispatch ?>">
						</div> <br>


						<div class="col-md-12">
							<label for="bsValidation8" class="form-label">Estimated Delivery Date</label>
							<input type="date" class="form-control" id="" name="delivery" value="<?php echo $delivery ?>">
						</div> <br>


						<div class="col-md-12">
							<label for="bsValidation10" class="form-label">Shipment mode</label>
							<input type="text" name="ship_mode" class="form-control" id="" placeholder="Shipment mode" name="" value="<?php echo $ship_mode ?>">
						</div> <br>


						<div class="col-md-12">
							<label for="bsValidation12" class="form-label">Quantity</label>
							<input type="text" class="form-control" id="" placeholder="Quantity" name="quantity" value="<?php echo $quantity ?>">
						</div> <br>

						<div class="col-md-12">
							<label for="bsValidation13" class="form-label">Delivery Time</label>
							<input type="time" class="form-control" id="" placeholder="Quantity" name="delivery_time" value="<?php echo $delivery_time ?>">

						</div> <br>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-body p-4">
					<div class="col-md-12">
						<div class="d-md-flex d-grid align-items-center gap-3">
							<button type="submit" style="width:  100%;" name="submit" class="btn btn-primary px-4">Submit</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
		<!--end row-->
	</div>
</div>
<script>
	<?php
	include 'footer.php';
	?>