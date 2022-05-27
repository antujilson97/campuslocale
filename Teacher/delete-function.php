<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>
<!-- --------------------------------Delete Attendance------------------------------------ -->
<?php 
	if (isset($_GET['attendance_id'])) {
		$attendance_id=$_GET['attendance_id'];
		$query4="delete   from student_attendance where attendance_id='$attendance_id'";
		$run3=mysqli_query($con,$query4);
		if ($run3) {
			header('Location: student-attendance.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>