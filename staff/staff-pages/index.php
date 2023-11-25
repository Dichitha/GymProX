<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
<title>Gym System Staff A/C</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<style>
.customer-column,
.todo-column {
    display: inline-block;
    vertical-align: top;
    margin-right: 10px; /* Adjust spacing between columns as needed */
}

.customer-name {
    font-weight: bold; /* Adjust styling as needed */
}

.todo-task {
    display: block; /* Ensure todo task is on a new line */
    margin-bottom: 5px; /* Add margin to separate customer name and todo task */
}
  </style>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Gympro</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php $page="dashboard"; include '../includes/header.php'?>
<!--close-top-Header-menu-->


<!--sidebar-menu-->
<?php $page="dashboard"; include '../includes/sidebar.php'?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content" >
<!--breadcrumbs-->
  <div id="content-header"style="background-color:#080145">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <!-- <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb span"> <a href="index.php"> <i class="icon-dashboard"></i> System Dashboard </a> </li>

        <li class="bg_ls span2"> <a href="announcement.php"> <i class="icon-bullhorn"></i>Announcements </a> </li> -->

        
        <!-- <li class="bg_ls span2"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
        <li class="bg_ly span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>
        <li class="bg_lb span2"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li> -->
        <!-- <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
        <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li> -->

      <!-- </ul>
    </div> -->
<!--End-Action boxes-->    

    <hr/>
    
      <div class="span6">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-tasks"></i></span>
            <h5>Customer's To-Do Lists</h5>
          </div>
          <div class="widget-content">
            <div class="todo">
              <ul>
              <?php

                include "dbcon.php";
                $qry="SELECT m.fullname, t.task_status, t.task_desc
                FROM members m
                INNER JOIN todo t ON m.user_id = t.user_id";
                $result=mysqli_query($conn,$qry);

                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<li class='clearfix'>";
                  echo "<div class='customer-column'>";
                  echo "<span class='customer-name'>" . $row["fullname"] . "</span>";
                  echo "</div>";
                  echo "<div class='todo-column'>";
                  echo "<span class='todo-task'>" . $row["task_desc"] . "</span>";
                  echo "<span class='date badge " . (($row["task_status"] == "Pending") ? "badge-important" : "badge-success") . "'>" . $row["task_status"] . "</span>";
                  echo "</div></li>";
              }
                echo"</li>";
              echo"</ul>";
              ?>
            </div>
          </div>
        </div>
       
      
       
      </div> <!-- End of ToDo List Bar -->
    </div>
  </div><!-- End of container-fluid -->
</div><!-- End of content-ID -->


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
<!-- <script src="../js/matrix.interface.js"></script>  -->
<script src="../js/matrix.chat.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/matrix.form_validation.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.popover.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
