<?php  
		session_start();
		require_once "../../connection/connection.php";
		if (!$_SESSION["LoginStudent"])
		{
			header('location:../../login/login.php');
		}
		if($_SESSION['LoginStudent']){
			$_SESSION['LoginAdmin'] = "";
		}
			
           
            $total_que=0;
            $res1=mysql_query($con,"SELECT * FROM questions WHERE category='$_SESSION[exam_category]'");
			$total_que=mysqli_num_rows($res1);
            echo $total_que;
	?>