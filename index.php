<?php session_start();
 include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Gym System Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-style.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/fontawesome.css" rel="stylesheet" />
        <link href="font-awesome/css/all.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    
    <body style="background-color:#080145">
    
        <div id="loginbox" style="background-color:#080145">            
            <form id="loginform" method="POST" class="form-vertical" action="#" style="background-color:#080145">
            <div class="control-group normal_text" style="background-color:#080145"> <h3><img src="staff\img\icontest3.png" alt="Logo" /></h3></div>
                <div class="control-group" style="background-color:#080145">
                    <div class="controls" style="background-color:#080145">
                        <div class="main_input_box" style="background-color:#080145">
                            <input type="text" name="user" placeholder="Username" required/>
                        </div>
                    </div>
                </div>
                <div class="control-group" style="background-color:#080145">
                    <div class="controls" style="background-color:#080145">
                        <div class="main_input_box" style="background-color:#080145">
                            <input type="password" name="pass" placeholder="Password" required />
                        </div>
                    </div>
                </div>
                <div class="form-actions center" style="background-color:#080145">
                    <!-- <span class="pull-right"><a type="submit" href="index.html" class="btn btn-success" /> Login</a></span> -->
                    <!-- <input type="submit" class="button" title="Log In" name="login" value="Admin Login"></input> -->
                    <button type="submit" class="btn btn-block btn-large btn-info" title="Log In" name="login" value="Admin Login">Admin Login</button>
                </div>
            </form>
            <?php
                if (isset($_POST['login']))
                    {
                        $username = mysqli_real_escape_string($con, $_POST['user']);
                        $password = mysqli_real_escape_string($con, $_POST['pass']);

                        // $password = md5($password);
                        
                        $query 		= mysqli_query($con, "SELECT * FROM admin WHERE  password='$password' and username='$username'");
                        $row		= mysqli_fetch_array($query);
                        $num_row 	= mysqli_num_rows($query);
                        
                        if ($num_row > 0) 
                            {			
                                $_SESSION['user_id']=$row['user_id'];
                                header('location:admin/index.php');
                                
                            }
                        else
                            {
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                Invalid Username and Password
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                </div>";
                            }
                    }
            ?>
            <div class="pull-left">
            <a href="customer/index.php" style="color:grey"><h6>Customer Login</h6></a>
            </div>

            <div class="pull-right">
            <a href="staff/index.php" style="color:grey"><h6>Staff Login</h6></a>
            </div>
            
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
<script src="js/matrix.js"></script>
    </body>
</html>
