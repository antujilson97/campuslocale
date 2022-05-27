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


<html lang="en">
	<head>
		<title>Salary report</title>
	</head>
	<body>
	<?php include('../common/common-header.php') ?>
		
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
			<div class="sub-main">
				<div class="text-left d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-9 text-black admin-dashboard pl-3">
				<h1 class=""> Campus Locale </h1></div>
				
                </div>  
				
				<div class="row">
					<div class="col-lg-9 col-md-12">
						<div>
							<section class="mt-3">
								<div class="btn btn-block table-three text-dark d-flex">
									<span class="font-weight-bold"><i class="fa fa-money mr-3" aria-hidden="true"></i> Staff Details :<?php $roll_no=$_SESSION['LoginTeacher'];
					$query="select * from teacher_info where email='$teacher_email'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
					}
					?> </span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"><i class="" aria-hidden="true"></i></a>
									
								</div>
								
								
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<table class="w-80 table-elements mb-10 table-three-tr"cellpadding="5" >
								<tr class="table-tr-head text-white table-three">
								<th>Salary Voucher</th><br>
											<th>Basic Salary</th>
											<th>Medical Allowance</th>
											<th>HR Allowance</th>
											<th>Pay Scale</th>
											<th>Paid Date</th>
											<th>Total Amount</th>
								</tr><br>
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
									</table>
								</div>
							</section><br>
							<div class="col-md-12">
								<center>
									<button onclick="window.print()" class="btn btn-primary">Print Report</button></center>
								</div>
						</div>
					</div>
					</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>