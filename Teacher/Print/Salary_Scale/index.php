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
  	<title>Campus Locale Salary Report</title>
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
				<div class="col-md-6 text-center mb-5">
					<h3 class="heading-section">Campus Locale <br></h3><h3><?php $roll_no=$_SESSION['LoginTeacher'];
					$query="select * from teacher_info where email='$teacher_email'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
					}
					?> </span></h3>
				</div>
				<div class="col-md-12">
								
									<button onclick="window.print()" class="btn btn-primary">Print Report</button>
								</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						  <th>Salary Voucher</th><br>
											<th>Basic Salary</th>
											<th>Medical Allowance</th>
											<th>HR Allowance</th>
											<th>Pay Scale</th>
											<th>Paid Date</th>
											<th>Total Amount</th>
						  </thead>
						  <tbody>
						    <tr>
							<?php  
											$teacher_id=$_SESSION['teacher_id'];
											$query="select salary_id,basic_salary,medical_allowance,hr_allowance,scale,Date(paid_date) as paid_date,total_amount from teacher_salary_allowances inner join teacher_salary_report on teacher_salary_allowances.teacher_id=teacher_salary_report.teacher_id where teacher_salary_allowances.teacher_id='$teacher_id'";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) { ?>
												<tr>
													<td><?php echo $row['salary_id'] ?></td>
													<td><?php echo $row['basic_salary'] ?></td>
													<td><?php echo ($row['basic_salary']*$row['medical_allowance']/100) ?></td>
													<td><?php echo ($row['basic_salary']*$row['hr_allowance']/100) ?></td>
													<td><?php echo $row['scale'] ?></td>
													<td><?php echo $row['paid_date'] ?></td>
													<td><?php echo $row['total_amount'] ?></td>
												</tr>		
											<?php
											}
										?>
						    </tr>
						   
						  </tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div><br>
		
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

