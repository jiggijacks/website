<?php
include 'header.php';

if (isset($_GET['delete'])) {
    $Dplans = $_GET['delete'];
    $sql = mysqli_query($link, "DELETE FROM tracking WHERE id = '$Dplans' ");
    if ($sql) {
        echo "<script>
            window.location.href = 'dashboard.php';
          </script>";
    }
}
?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> -->
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Tracking Number</th>
                                <th>Status</th>
                                <th>Date Added</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Copy</th>
                                <th>View Details</th>
                                <th>View Updates</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i = 0;
                        $tr = mysqli_query($link, "SELECT * FROM tracking ");
                        if (mysqli_num_rows($tr) > 0) {
                            while ($row = mysqli_fetch_assoc($tr)) {
                                $id = $row['id'];
                                $i++;
                        ?>
                        <form method="post" action="dashboard.php">
                            <input type="hidden" id="tn<?php echo $row['id'] ?>" name="tnumb" value="<?php echo $row['tracking_number'] ?>">
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><img style="height: 90px;width: 90px;" src="../uploads/<?php echo $row['image'] ?>" ></td>
                                <td><b><?php echo $row['tracking_number'] ?></b></td>
                                <td><b><?php echo $row['status'] ?></b></td>
                                <td><b><?php echo $row['date'] ?></b></td>
                                <td><a href="edit-tracking.php?num=<?php echo $row['tracking_number'] ?>" class="btn btn-primary">Update</a></td>
                                <td><a class="btn btn-sm btn-danger" onclick="return confirm('Do you really want to delete this ?')" style="color: white;" href="dashboard.php?delete=<?php echo $id ?>">Delete</a></td>
                                <td><button type="button" onclick="copyContent('<?php echo $row['tracking_number'] ?>')" class="btn btn-info">Copy Tracking Number</button></td>
                                <td><a class="btn btn-secondary" href="view-details.php?num=<?php echo $row['tracking_number'] ?>">View Details</a></td>
                                <td><a class="btn btn-warning" href="view-updates.php?num=<?php echo $row['tracking_number'] ?>">View Updates</a></td>
                            </tr>
                            <input type="hidden" id="tn<?php echo $row['id'] ?>" value="<?php echo $row['tracking_number'] ?>">
                            <input type="hidden" name="image" value="<?php echo $row['image'] ?>">
                        </form>
                        <script>
                            function copyContent(trackingNumber) {
                                navigator.clipboard.writeText(trackingNumber).then(function() {
                                    alert("Copied the tracking number: " + trackingNumber);
                                }, function(err) {
                                    console.error('Async: Could not copy text: ', err);
                                });
                            }
                        </script>
                        <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
