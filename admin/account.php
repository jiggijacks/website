<?php
    include 'header.php';

    if (isset($_POST['save'])) {
		$adminuser = text_input($_POST['username']);
		$adminpass = text_input($_POST['password']);
		if (empty($adminuser) || empty($adminpass)) {
			echo "<script>alert('Empty Field(s)')</script>";
		}else{
			mysqli_query($link, "UPDATE admin SET username = '$adminuser', password = '$adminpass' WHERE username = '$username' ");
			echo "<script>
			alert('Successfully updated');
			window.location.href = 'account.php';
			</script>";
			exit();
		}
	}

	function text_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
	}
?>


<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-header px-4 py-3">
                        <h5 class="mb-0">Account Settings</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="account.php" class="forms-sample">

                            <div class="col-md-12">
                                <label for="" class="form-label">Admin Name</label>
                                <input type="text" class="form-control"  name="username" value="<?php echo $username ?>" id="exampleInputUsername1" placeholder="Admin Name">
                            </div>


                            <div class="col-md-12">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" value="<?php echo $apass ?>" name="password"  placeholder="Admin Password">
                            </div>


                         
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" style="width:  100%;" name="save-mail" class="btn btn-primary px-4">Submit</button>
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