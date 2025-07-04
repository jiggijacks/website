<?php
include 'header.php';

if (isset($_POST['save-mail'])) {
    $mail_name = trim($_POST['mail_name']);
    $mail_track = trim($_POST['mail_track']);
    $mail_update = trim($_POST['mail_update']);

    $mailhost = trim($_POST['mailhost']);
    $webmail = trim($_POST['webmail']);
    $mailpassword = trim($_POST['mailpassword']);
    $mailport = trim($_POST['mailport']);
    $mailsmtpsecure = trim($_POST['mailsmtpsecure']);

    if (!empty($mail_name) && !empty($mail_track) && !empty($mail_update) && !empty($mailhost) && !empty($webmail) && !empty($mailpassword) && !empty($mailport) && !empty($mailsmtpsecure)) {
        $sql = mysqli_query($link, "UPDATE settings SET 
            email_name = '$mail_name',
            mail_track_update ='$mail_update', 
            mail_track_save ='$mail_track',
            mailhost = '$mailhost',
            webmail = '$webmail',  
            mailpassword = '$mailpassword', 
            mailport = '$mailport', 
            mailsmtpsecure = '$mailsmtpsecure' 
            WHERE id = 1");
        if ($sql) {
            echo "<script>
                alert('Settings saved');
                window.location.href = 'email-settings.php';
            </script>";
        }
    }
}


$result = mysqli_query($link, "SELECT * FROM settings WHERE id = 1");
$row = mysqli_fetch_assoc($result);
$email_name = $row['email_name'];
$mail_host = $row['mailhost'];
$web_mail = $row['webmail'];
$mail_password = $row['mailpassword'];
$mail_port = $row['mailport'];
$mail_smtp_secure = $row['mailsmtpsecure'];
$mail_track_save = $row['mail_track_save'];
$mail_track_update = $row['mail_track_update'];

?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-header px-4 py-3">
                        <h5 class="mb-0">E-mail Settings</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="email-settings.php" class="forms-sample">

                            <div class="col-md-12">
                                <label for="" class="form-label">Email Name</label>
                                <input type="text" class="form-control" name="mail_name" value="<?php echo $email_name ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Mail host</label>
                                <input type="text" class="form-control" name="mailhost" value="<?php echo $mail_host ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Web mail</label>
                                <input type="text" class="form-control" name="webmail" value="<?php echo $web_mail ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Mail password</label>
                                <input type="text" class="form-control" name="mailpassword" value="<?php echo $mail_password ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Mail port</label>
                                <input type="text" class="form-control" name="mailport" value="<?php echo $mail_port ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Mailsmtpsecure</label>
                                <input type="text" class="form-control" name="mailsmtpsecure" value="<?php echo $mail_smtp_secure ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Send Mail When For New Tracking</label>
                                <select name="mail_track" class="form-control" required="">
                                    <option value="Yes" <?php echo $mail_track_save == "Yes" ? "selected" : "" ?>>Yes</option>
                                    <option value="No" <?php echo $mail_track_save == "No" ? "selected" : "" ?>>No</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="" class="form-label">Send Mail When Tracking's Update</label>
                                <select name="mail_update" class="form-control" required="">
                                    <option value="Yes" <?php echo $mail_track_update == "Yes" ? "selected" : "" ?>>Yes</option>
                                    <option value="No" <?php echo $mail_track_update == "No" ? "selected" : "" ?>>No</option>
                                </select>
                            </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" style="width: 100%;" name="save-mail" class="btn btn-primary px-4">Submit</button>
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
