<?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../../../login/login.php');
	}
		require_once "../../../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php
	$_SESSION["LoginAdmin"]="";
	$teacher_email=$_SESSION['LoginTeacher'];
	$query1="select * from teacher_info where email='$teacher_email'";
	$run1=$run=mysqli_query($con,$query1);
	while($row=mysqli_fetch_array($run1)) {
		$teacher_id=$row["teacher_id"];
	}
	$_SESSION['teacher_id']=$teacher_id;
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Attendance Sheet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
					<h2 class="heading-section">Campus Locale</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="h5 mb-4 text-center">Attendance Report</h3>
					<div class="table-wrap">
						<table class="table myaccordion table-hover" id="accordion">
						  <thead>
						    <tr>
							<th>Sr.No</th>
									<th>Date</th>
									<th>Course</th>
									<th>Subject Code</th>
									<th>Roll no</th>
									<th>Student Name</th>
									<th>Present(1)/Absent(0)</th>
									
									
									
									
						    </tr>
						  </thead>
						  <tbody>
						    <tr data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							<?php
									$sr=1;
									$query="select student_id,subject_code,attendance,attendance_date,attendance_id,first_name,middle_name,last_name from student_attendance,student_info ORDER BY attendance_date ASC;";
									$run=mysqli_query($con,$query);
									while($row=mysqli_fetch_array($run)) {
									echo	"<tr>";
									echo	"<td>".$sr++."</td>";
									echo	"<td>".$row['attendance_date']."</td>";
									echo	"<td>".$row['subject_code']."</td>";
									echo	"<td>".$row['subject_code']."</td>";
									echo	"<td>".$row['student_id']."</td>";
									echo	"<td>".$row['first_name'];
									echo	$row['middle_name'];
									echo	$row['last_name']."</td>";
									echo	"<td>".$row['attendance']."</td>";
									echo	"</tr>";
									} 
								?>
						   
						    </tr>

						    
						  </tbody>
						</table>
						
				</div>
				<div class="col-md-12">
								
									<button onclick="window.print()" class="btn btn-primary">Print Report</button>
								</div>
					</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

