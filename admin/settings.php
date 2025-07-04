<?php
include 'header.php';

if (isset($_POST['save-general'])) {
    $site_name = trim($_POST['site_name']);
    $sitetitle = trim($_POST['sitetitle']);
    $siteurl = trim($_POST['siteurl']);
    $mailhost = trim($_POST['mailhost']);
    $webmail = trim($_POST['webmail']);
    $mailpassword = trim($_POST['mailpassword']);
    $mailport = trim($_POST['mailport']);
    $mailsmtpsecure = trim($_POST['mailsmtpsecure']);

    if (!empty($site_name) && !empty($sitetitle)) {
        $sql = mysqli_query($link, "UPDATE settings SET `site_url` = '$siteurl', `sitename`='$site_name',`site_title`='$sitetitle' WHERE id = 1 ");
        if ($sql) {
            echo "<script>
                alert('Settings saved');
                window.location.href = 'settings.php';
                </script>";
        }
    }
}
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-header px-4 py-3">
                        <h5 class="mb-0">General Settings</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="settings.php" class="forms-sample">

                            <div class="col-md-12">
                                <label for="" class="form-label">Site Name</label>
                                <input type="text" name="site_name" class="form-control" value="<?php echo $sitename ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Site Title</label>
                                <input type="text" name="sitetitle" class="form-control" value="<?php echo $site_title ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Site URL</label>
                                <input type="text" class="form-control" name="siteurl" value="<?php echo $site_url ?>" required>
                            </div>
           
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" style="width:  100%;" name="save-general" class="btn btn-primary px-4">Submit</button>
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