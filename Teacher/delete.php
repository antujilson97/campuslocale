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
<!-- --------------------------------Delete Course------------------------------------- -->
<?php 
	if (isset($_GET['category_id'])) {
		$category_id=$_GET['category_id'];
		$query7="DELETE from exam_category where category_id='$category_id'";
		$run2=mysqli_query($con,$query7);
		if ($run2) {
			header('Location:exam_category.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
