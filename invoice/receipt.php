<?php
include '../db.php';
include '../config.php';


$shiping_cost = 0;
$clearance_cost = 0;
$total_cost = 0;


if (isset($_GET['tnum']) &&  $_GET['tnum'] != "") {
  $trackId = $_GET['tnum'];
  $sql = mysqli_query($link, "SELECT * FROM tracking WHERE tracking_number = '$trackId' ");
  if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
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
    $image = $row['image'];
    $destination = $row['destination'];
    $date = $row['date'];

    $barcode_url = "https://barcode.tec-it.com/barcode.ashx?data=" . urlencode($trackId) . "&code=Code128";
  }

  $sqls = mysqli_query($link, "SELECT * FROM track_update  WHERE track_num = '$trackId' ORDER BY track_num DESC LIMIT 1  ");
  if (mysqli_num_rows($sqls) > 0) {
    $rows = mysqli_fetch_assoc($sqls);
    $status = $rows['status'];
    $current_location = $rows['current_location'];
    $shiping_cost  = $rows['shiping_cost'];
    $clearance_cost = $rows['clearance_cost'];
    $total_cost = $clearance_cost + $shiping_cost;
  }
}

?>
<!DOCTYPE html>
<html>

<head>

  <title><?php echo $sitename ?></title>

  <!-- Define Charset -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <!-- Page Description and Author -->
  <meta name="description" content="Airfright Express " />
  <meta name="keywords" content="Airfright Express" />
  <meta name="author" content="Jaomweb">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=1200">
  <!-- Bootstrap 3.3.4 -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="css/print-invoice.min.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src="barcode.js"></script>


  <style>
    #background {
      position: absolute;
      z-index: 0;
      display: block;
      min-height: 70%;
      min-width: 70%;
    }

    #content {
      position: absolute;
      z-index: 1;
    }

    #bg-text {
      color: grey;
      font-size: 36px;
      transform: rotate(300deg);
      -webkit-transform: rotate(300deg);
    }
  </style>





</head>

<body style="background-color:teal;" onload="window.print();" >


 


  <div class="wrapper" id="background">
    <p id="bg-text">Certified True Copy</p>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <span><img src="image/logo-3.png" width='200'>

              <img class="pull-right" src="image/banner.png" alt="" height="185" />

              <h3 style="color:red;"><strong> Tracking Number: <?php echo $trackId ?></strong>
              </h3>
            </span>

          </h2>
        </div><!-- /.col -->
      </div>

      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <center>
              <strong style="color:green;"><?php echo $sitename ?><br>

                Email: <?php echo $email_name ?><br>
                Company Website:<?php echo $site_url ?></strong>
            </center>
          </h2>
        </div><!-- /.col -->
      </div>


      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <strong style="color:blue;">FROM (SENDER)</strong>
          <address>
            <h3><strong style="color:green;"><?php echo $senders_name ?></strong></h3>


            <b>Address:</b> <?php echo $senders_address ?>
          </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong style="color:blue;">TO (CONSIGNEE)</strong>
          <address>
            <h3><strong style="color:green;"><?php echo $receivers_name ?></strong></h3>

            <b>Phone:</b> <?php echo $receivers_contact  ?><br /> <br>
            <b>Address:</b><?php echo $receivers_address ?>
          </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <table>
            <tr>
              <td>
                <center>
                  <?php if (isset($trackId)) : ?>

                    <!-- Display other tracking details as needed -->
                    <img src="<?php echo $barcode_url; ?>" alt="Barcode for <?php echo htmlspecialchars($trackId); ?>">
                  <?php endif; ?>

                </center>
              </td>

            </tr>
          </table>
          <br />
          <!-- <b>Order ID:</b>&nbsp;&nbsp;214 <br/> -->
          <b>carrier:</b> <small class="label label-danger"><i class="fa fa-money"></i>&nbsp;&nbsp;<?php echo $carrier ?></small><br />
          <b>Shipment Cost:</b>&nbsp;USD&nbsp;<?php echo number_format($shiping_cost, 2) ?><br />
          <b>Tracking Number:</b>&nbsp;&nbsp;<?php echo $trackId ?> <br />
        </div><!-- /.col -->
      </div><!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Qty</th>
                <th>Current location</th>
                <th>Status</th>
                <th>Description</th>
                <th>Shipping Cost</th>
                <th>Clearance Cost</th>
                <th>Total Cost</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $quantity ?></td>
                <td><?php echo $current_location ?></td>
                <td><small class="label label-success"><?php echo $status ?> </small></td>
                <td><?php echo $desc ?> </td>
                <td>USD&nbsp;<?php echo number_format($shiping_cost, 2) ?> </td>
                <td>USD&nbsp;<?php echo number_format($clearance_cost, 2) ?></td>
                <td>USD&nbsp;<?php echo number_format($total_cost, 2) ?></td>
              </tr>
            </tbody>
          </table>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <br>
      <br>
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-4">
          <p class="lead"><strong>Payment Methods:</strong><?php echo $payment_mode  ?></p>
          <img src="image/securepayment.png" alt="Methods payments" />
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <?php echo $invoice_terms ?>
          </p>

        </div>



        <div class="col-xs-4">
          <p class="lead"><strong>Official Stamp/<?php echo $date ?></strong></p>
          <img src=" image/stamp1.png" alt="" height="100" />

        </div>
        <div class="col-xs-4">
          <p class="lead">Stamp Duty:</p>
          <img class='text-center' src="image/stamp2.png" alt="" height="100" />

        </div>



        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead"><strong>Amount Due </strong></p>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">SHIPPING COST:</th>
                <th>CLEARANCE COST:</th>
                <th>TOTAL AMOUNT:</th>
              </tr>
              <tr>
                <td>USD&nbsp;<?php echo number_format($shiping_cost, 2) ?></td>
                <td>USD&nbsp;<?php echo number_format($clearance_cost, 2) ?></td>
                <td>USD&nbsp;<?php echo number_format($total_cost, 2) ?></td>
              </tr>

            </table>
          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
  </div><!-- ./wrapper -->



  <script src="js/app.min.js" type="text/javascript"></script>
</body>

</html>