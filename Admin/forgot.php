<?php 
session_start();
$error = array();

require "mail.php";

	if(!$con = mysqli_connect("localhost","root","","camloc")){

		die("could not connect");
	}

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}

	//something is posted
	if(count($_POST) > 0){

		switch ($mode) {
			case 'enter_email':
				// code...
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}elseif(!valid_email($email)){
					$error[] = "That email was not found";
				}else{

					$_SESSION['forgot']['email'] = $email;
					send_email($email);
					header("Location: forgot.php?mode=enter_code");
					die;
				}
				break;

			case 'enter_code':
				// code...
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "the code is correct"){

					$_SESSION['forgot']['code'] = $code;
					header("Location: forgot.php?mode=enter_password");
					die;
				}else{
					$error[] = $result;
				}
				break;

			case 'enter_password':
				// code...
				$password = $_POST['password'];
				$password2 = $_POST['password2'];

				if($password !== $password2){
					$error[] = "Passwords do not match";
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: forgot.php");
					die;
				}else{
					
					save_password($password);
					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}

					header("Location:../login.php");
					die;
				}
				break;
			
			default:
				// code...
				break;
		}
	}

	function send_email($email){
		
		global $con;

		$expire = time() + (60 * 1);
		$code = rand(10000,99999);
		$email = addslashes($email);

		$query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
		mysqli_query($con,$query);

		//send email here
		send_mail($email,'Password reset',"Your code is " . $code);
	}
	
	function save_password($password){
		
		global $con;

		
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "update login set Password = '$password' where user_id = '$email' limit 1";
		mysqli_query($con,$query);

	}
	
	function valid_email($email){
		global $con;

		$email = addslashes($email);

		$query = "select * from login where user_id = '$email' limit 1";		
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}

		return false;

	}

	function is_code_correct($code){
		global $con;

		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['expire'] > $expire){

					return "the code is correct";
				}else{
					return "the code is expired";
				}
			}else{
				return "the code is incorrect";
			}
		}

		return "the code is incorrect";
	}

	
?>

<!DOCTYPE html>
<html>
<head>
<?php include('header.php') ?>
<title>Campus Locale-Forgot Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no initial-scale=1">
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../../Login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../../Login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../../Login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../../Login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../../Login-/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../../Login-/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../Login/css/main.css">

	
</head>
<body>
<div class="limiter">
		 <div class="container-login100">
           <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(../Login/images/bg-01.jpg);">
            <span class="login100-form-title-1">
					Forgot password
					</span>  
                </div>	

		<?php 

			switch ($mode) {
				case 'enter_email':
					// code...
					?>
						<form class="login100-form validate-form" method="post" action="forgot.php?mode=enter_email"> 
							
						<div class="wrap-input100  m-b-26" >
                    <span class="label-input100">Email Id</span>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>
							<input class="textbox" type="email" name="email" placeholder="Email"><br>
							</div>
							<div class="container-login100-form-btn"  align="right">
							<input type="submit" value="Send OTP" class="login100-form-btn">
							</div>
							<br><br>
							<div><a href="../login.php">Login to campus locale</a></div>
						</form>
					<?php				
					break;

				case 'enter_code':
					// code...
					?>
					
						<form  class="login100-form validate-form" method="post" action="forgot.php?mode=enter_code"> 
						<div class="wrap-input100  m-b-26" >
                    <span class="label-input100">Enter OTP</span>
					<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							

							<input class="textbox" type="text" name="code" placeholder="Enter Code"><br>
							<span class="focus-input100"></span>
                    </div>
							<div class="container-login100-form-btn"  align="right">
							<input class="login100-form-btn" type="submit" value="Next" style="float: right;">
							
							
							</div>
							<br><br>
							
						</form>
					<?php
					break;

				case 'enter_password':
					// code...
					?>
						<form class="login100-form validate-form" method="post" action="forgot.php?mode=enter_password"> 
						<div class="wrap-input100  m-b-26" >
                    <span class="label-input100">New password</span>
							
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							<input class="textbox" type="text" name="password" placeholder="Password"><br>
							</div>
							<div class="wrap-input100  m-b-26" >
							<input class="textbox" type="text" name="password2" placeholder="Confirm Password"><br>
						
							<br style="clear: both;">
							<div class="container-login100-form-btn"  align="right">
							<input class="login100-form-btn" type="submit" value="Next" style="float: right;">
							
							
						</form>
					<?php
					break;
				
				default:
					// code...
					break;
			}

		?>

<script src="../../Login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../../Login/vendor/animsition/js/animsition.min.js"></script>
	<script src="../../Login/vendor/bootstrap/js/popper.js"></script>
	<script src="../../Login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../Login/vendor/select2/select2.min.js"></script>
	<script src="../../Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../../Login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../../Login/vendor/countdowntime/countdowntime.js"></script>
	<script src="../../Login/js/main.js"></script>

</body>
</html>