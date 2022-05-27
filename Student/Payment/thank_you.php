<h1>Payment Complete</h1>
<?php

session_start();
if (!$_SESSION["LoginStudent"])
	{
		header('location:../../login/login.php');
	}
		require_once "../../connection/connection.php";
echo '<script>alert("Payment Scuessfully completed")</script>';

echo ('
    <script>
    window.location.href="student-fee.php";
    </script>');
?>