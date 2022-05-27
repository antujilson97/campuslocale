<!-- PHP Starts Here -->
<?php 
session_start();
    require_once "../connection/connection.php"; 
    $message="OOPS";
    if(isset($_POST["btnlogin"]))
    {
        $username=$_POST["email"];
        $password=$_POST["password"];
        $username=stripcslashes($username);
        $passworde=stripcslashes($password);
        $username=mysqli_real_escape_string($con,$username);
        $passworde=mysqli_real_escape_string($con,$password);


        $query="select * from login where user_id='$username' and Password='$password' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
                if ($row["Role"]=="Admin")
                {
                    $_SESSION['LoginAdmin']=$row["user_id"];
                    header('Location: ../admin/admin-index.php');
                }
                else if ($row["Role"]=="Teacher" )
                {
                    $_SESSION['LoginTeacher']=$row["user_id"];
                    header('Location: ../teacher/teacher-index.php');
                }
                else if ($row["Role"]=="Student" )
                {
                    $_SESSION['LoginStudent']=$row['user_id'];
                    header('Location: ../student/student-index.php');
                }
            }
        } 
        else
        { 
            header("Location: login.php");
        }
    }
?>

<!doctype html>
<html lang="en">
	<head>
    <?php include('header.php') ?>
    
		<title>Login Campus Locale</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no initial-scale=1">
        <link rel="icon" type="../Login/image/png" href="../Login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../Login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../Login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../Login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../Login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../Login-/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../Login-/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Login/css/main.css">
</head>
	<body>
        <div class="limiter">
		 <div class="container-login100">
           <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(../Login/images/bg-01.jpg);">
            <span class="login100-form-title-1">
						Sign In
					</span>  
                </div>

                    <form class="login100-form validate-form" action="login.php" method="POST">
                    <div class="wrap-input100  m-b-26" >
                    <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="email" placeholder="Enter User ID" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100  m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
                        <input  class="input100" type="Password" name="password" placeholder="Enter Password"  required>
                       <span class="focus-input100"></span> 
                    </div>
                    
                   
                    <div class="container-login100-form-btn"  align="right">
                        <input type="submit" name="btnlogin" value="LOGIN" class="login100-form-btn">
                       
                    </div>
                    <a href="forgotpassword/forgot.php" class="float-end">Forgot your Password?</a>
                       
                      
                  
                    
                    
                    </form>
                    
            </div>
        </div>
</div>
    <script src="../Login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../Login/vendor/animsition/js/animsition.min.js"></script>
	<script src="../Login/vendor/bootstrap/js/popper.js"></script>
	<script src="../Login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../Login/vendor/select2/select2.min.js"></script>
	<script src="../Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../Login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../Login/vendor/countdowntime/countdowntime.js"></script>
	<script src="../Login/js/main.js"></script>

    </body>
</html>



