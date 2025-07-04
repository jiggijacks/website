<?php
    include 'header.php';

    if (isset($_POST['save-ship'])) {
        $prefix = trim($_POST['prefix']);
        $trace = trim($_POST['trace']);
        $print = trim($_POST['print']);
        $map = trim($_POST['show_map']);
        $terms = trim($_POST['terms']);
    
        if (!empty($prefix) && !empty($trace) && !empty($print) && !empty($show_map) && !empty($terms)) {
            $sql = mysqli_query($link, "UPDATE settings SET `track_prefix`='$prefix',`track_num`='$trace',`invoice_terms`='$terms',`allow_print`='$print',`show_map`='$map' WHERE id = 1 ");
            if ($sql) {
                echo "<script>
                alert('Settings saved');
                window.location.href = 'shipping_settings.php';
                </script>";
            }
        }
    }


?>


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
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-header px-4 py-3">
                        <h5 class="mb-0">Shipping Settings</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="shipping_settings.php" class="forms-sample">
                          
                            <div class="col-md-12">
                                <label for="" class="form-label">Delivery Prefix</label>
                                <input type="text" name="prefix" minlength="2" class="form-control"value="<?php echo $track_prefix ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Number of digits in the trace: EXAMPLE: 0000001</label>
                                <input type="number" class="form-control" value="<?php echo $track_num ?>" name="trace" id="" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Allow Print Invoice</label>
                                <select name="print" class="form-control" required="">
			                     	<option value="Yes" <?php echo $allow_print == "Yes" ? "selected" : "" ?>>Yes</option>
			              	       <option value="No" <?php echo $allow_print == "No" ? "selected" : "" ?>>No</option>
			                    </select>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Allow Print Invoice</label>
                                <label for="exampleInputEmail1">Show Map</label>
			              <select name="show_map" class="form-control" required="">
			              	<option value="Yes" <?php echo $show_map == "Yes" ? "selected" : "" ?>>Yes</option>
			              	<option value="No" <?php echo $show_map == "No" ? "selected" : "" ?>>No</option>
			              </select>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Invoice Terms</label>
                                <textarea name="terms" class="form-control"><?php echo $invoice_terms ?></textarea>
                            </div>
                    </div>
                </div>
                
			<div class="card">
				<div class="card-body p-4">
					<div class="col-md-12">
						<div class="d-md-flex d-grid align-items-center gap-3">
							<button type="submit" style="width:  100%;" name="save-ship" class="btn btn-primary px-4">Submit</button>
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




















<?php
    include 'footer.php';
?>