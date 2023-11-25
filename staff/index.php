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
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    
    <body style="background-color:#080145">
    
        <div id="loginbox" style="background-color:#080145">            
            <form id="loginform" method="POST" class="form-vertical" action="#" style="background-color:#080145">
            <div class="control-group normal_text" style="background-color:#080145"> <img src="img/icontest3.png"></img></div>
                <div class="control-group" style="background-color:#080145">
                    <div class="controls" style="background-color:#080145">
                        <div class="main_input_box" style="background-color:#080145 ">
                            <span class="add-on bg_lg" style="background-color:#080145 ;width: 600px;"></span><input type="text" name="user" placeholder="Username" required/>
                        </div>
                    </div>
                </div>
                <div class="control-group" style="background-color:#080145">
                    <div class="controls" style="background-color:#080145">
                        <div class="main_input_box" style="background-color:#080145">
                            <span class="add-on bg_ly " style="background-color:#080145;width: 600px;"></i></span><input type="password" name="pass" placeholder="Password" required />
                        </div>
                    </div>
                </div>
                <div class="form-actions center">
                    <button type="submit" class="btn btn-block btn-large btn-warning" title="Log In" name="login" value="Admin Login">Staff Login</button>
                </div>
            </form>
            <?php
                if (isset($_POST['login']))
                    {
                        $username = mysqli_real_escape_string($con, $_POST['user']);
                        $password = mysqli_real_escape_string($con, $_POST['pass']);

                        $password = md5($password);
                        
                        $query 		= mysqli_query($con, "SELECT * FROM staffs WHERE password='$password' and username='$username'");
                        $row		= mysqli_fetch_array($query);
                        $num_row 	= mysqli_num_rows($query);
                        
                        if ($num_row > 0) 
                            {			
                                $_SESSION['user_id']=$row['user_id'];
                                header('location:staff-pages/index.php');
                                
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
            <a href="../index.php"><h6>Admin Login</h6></a>
            </div>

            <div class="pull-right">
            <a href="../customer"><h6>Customer Login</h6></a>
            </div>
            
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
<script src="js/matrix.js"></script>
    </body>

</html>