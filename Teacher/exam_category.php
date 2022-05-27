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




<!doctype html>
<html lang="en">
	<head>
		<title>EXAM ADD</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-4 text-white admin-dashboard pl-3">
					<h4 class="">ADD NEW SEMESTER QUIZ</h4>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<form name="form1" action="" method="post">
								
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">New Exam Category:*</label>
										<input type="text" class="form-control" name="examname" placeholder="Exam Category" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Exam Time in Minutes:*</label>
										<input type="text" class="form-control" name="examtime" placeholder="Exam Time">
									</div>
								</div>
							</div>
							
								

                            
						
							<div class="row">
								<div class="col-md-4 offset-5 mt-3">
									<button type="submit" name="submit11" value="Add Exam" class="btn btn-primary">ADD EXAM</button>
								</div>
							</div>
                           
                            <br>
                            <div class="row">
					<div class="col-md-12">
						<section class="border mt-3">
							<table class="w-100 table-striped table-white"cellpadding="5" >
                                <thead>
								<tr>
									<th scope="col">Sr.No</th>
									<th scope="col">Exam Name</th>
									<th scope="col">Exam Time</th>
									<th scope="col">Edit</th>
									<th scope="col">Delete</th>
                                    <th scope="col">Select</th>
									
								</tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=0;
                                    $res5=("select * from exam_category");
                                    $run11=mysqli_query($con,$res5);
                                    while($row=mysqli_fetch_array($run11))
                                    {
                                        $count=$count+1;
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo  $count;?></th>
                                            <td><?php echo $row["category"];?></td>
                                            <td><?php echo $row["exam_time_in_minutes"];?></td>
                                            <td><a class='btn btn-danger' href="edit_exam.php?category_id= <?php echo $row["category_id"];?>">EDIT</a></td>
                                            <td><a class='btn btn-danger' href="delete.php?category_id= <?php echo $row["category_id"];?>">DELETE</a></td>
                                            <td><a class='btn btn-danger' href="add_edit_questions.php?category_id= <?php echo $row["category_id"];?>">SELECT</a></td>

                                              </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                
						</form>
					</div>
				</div>	
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>


<?php 


if (isset($_POST['submit11'])) { 
    mysqli_query($con,"INSERT into exam_category values (NULL,'$_POST[examname]','$_POST[examtime]')") 
  ?>
     <script type="text/javascript">
         window.location.href=window.location.href;
     </script>
 <?php 
 }
  ?>
     





