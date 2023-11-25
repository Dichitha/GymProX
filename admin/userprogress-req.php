<?php
session_start();
// Check if the user is logged in, stored in the session
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gym System Admin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/fullcalendar.css"/>
    <link rel="stylesheet" href="../css/matrix-style.css"/>
    <link rel="stylesheet" href="../css/matrix-media.css"/>
    <link href="../font-awesome/css/fontawesome.css" rel="stylesheet"/>
    <link href="../font-awesome/css/all.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">GymPro Admin</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<?php include 'includes/topheader.php'?>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->

<!--sidebar-menu-->
<?php $page = 'manage-customer-progress'; include 'includes/sidebar.php'?>
<!--sidebar-menu-->

<div id="content">
<div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a>
        <a href="customer-progress.php" class="tip-bottom">Progress Form</a>
        <a href="#" class="current">Update Progress</a>
    </div>
    <h1 class="text-center">Update Customer's Progress <i class="fas fa-signal"></i></h1>
</div>
<div class="form-actions">
    <?php

    if (isset($_POST['ini_weight'])) {
        $ini_weight = $_POST["ini_weight"];
        $curr_weight = $_POST["curr_weight"];
        $ini_bodytype = $_POST["ini_bodytype"];
        $curr_bodytype = $_POST["curr_bodytype"];
        $id = $_POST['id'];

        include 'dbcon.php';

        // Call the stored procedure to update user's progress
        $query = "CALL UpdateUserProgress($id, $ini_weight, $curr_weight, '$ini_bodytype', '$curr_bodytype')";
        if (mysqli_multi_query($conn, $query)) {
            do {
                // Store the result set
                if ($result = mysqli_store_result($conn)) {
                    mysqli_free_result($result);
                }
            } while (mysqli_next_result($conn));

            // Successful update
            echo "<div class='text-center'>";
            echo "<h1>Successfull</h1>";
            echo "<h3>Changes Done Successfully!</h3>";
            echo "<p>The requested user's progress has been updated. Please click the button to go back.</p>";
            echo "<a class='btn btn-inverse btn-big' href='index.php'>Return Home</a>";
            echo "</div>";
        } else {
            // Handle the error if the stored procedure call fails
            echo "Error updating user's progress: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "<h3>Invalid parameters.</h3>";
    }
    ?>
</div>
</div></div>
</div>

<!--end-main-container-part-->

<script src="../js/excanvas.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.flot.min.js"></script>
<script src="../js/jquery.flot.resize.min.js"></script>
<script src="../js/jquery.peity.min.js"></script>
<script src="../js/fullcalendar.min.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.dashboard.js"></script>
<script src="../js/jquery.gritter.min.js"></script>
<script src="../js/matrix.interface.js"></script>
<script src="../js/matrix.chat.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/matrix.form_validation.js"></script>
<script src="../js/jquery.wizard.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/matrix.popover.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/matrix.tables.js"></script>

</body>
</html>
