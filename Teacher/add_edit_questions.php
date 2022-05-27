<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
        $category_id=$_GET["category_id"];
        $exam_category='';
            $res=mysqli_query($con,"SELECT * FROM exam_category WHERE category_id=$category_id" );
            while($row=mysqli_fetch_array($res))
            {
                $exam_category=$row["category"];
            }
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
					<h4 class="">ADD QUESTIONS BASED ON-<?php echo $exam_category;?></h4>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<form name="form1" action="" method="post">
								
							<div class="row">
								<div class="col-md-10">
									<div class="form-group">
										<label for="exampleInput">Add New Question:*</label>
										<input type="text" class="form-control" name="question" placeholder="Question" >
									</div>
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<label for="exampleInput">Add Option 1:*</label>
										<input type="text" class="form-control" name="opt1" placeholder="Option 1" >
									</div>
								</div>
                                <div class="col-md-10">
									<div class="form-group">
										<label for="exampleInput">Add Option 2:*</label>
										<input type="text" class="form-control" name="opt2" placeholder="Option 2" >
									</div>
								</div>
                                <div class="col-md-10">
									<div class="form-group">
										<label for="exampleInput">Add Option 3:*</label>
										<input type="text" class="form-control" name="opt3" placeholder="Option 3" >
									</div>
								</div>
                                <div class="col-md-10">
									<div class="form-group">
										<label for="exampleInput">Add Option 4:*</label>
										<input type="text" class="form-control" name="opt4" placeholder="Option 4" >
									</div>
								</div>
                                <div class="col-md-10">
									<div class="form-group">
										<label for="exampleInput">Add Answer:*</label>
										<input type="text" class="form-control" name="answer" placeholder="Add Answer" >
									</div>
								</div>
							</div>
							
								

                            
						
							<div class="row">
								<div class="col-md-4 offset-5 mt-3">
									<button type="submit" name="submit1" value="Add Exam" class="btn btn-primary">ADD QUESTION</button>
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
									<th scope="col">Questions</th>
									<th scope="col">Opt1</th>
									<th scope="col">Opt2</th>
									<th scope="col">Opt3</th>
                                    <th scope="col">Opt4</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
									
								</tr>
                                </thead>
                                <tbody>
                           <?php
                           $res1=mysqli_query($con,"SELECT * FROM questions where category='$exam_category'order by question_number asc");
                           while($row=mysqli_fetch_array($res1))
                           {
                               echo"<tr>";
                               echo"<td>"; echo $row["question_number"]; echo"</td>";
                               echo"<td>"; echo $row["question"]; echo"</td>";
                               echo"<td>"; echo $row["opt1"]; echo"</td>";
                               echo"<td>"; echo $row["opt2"]; echo"</td>";
                               echo"<td>"; echo $row["opt3"]; echo"</td>";
                               echo"<td>"; echo $row["opt4"]; echo"</td>";
                               ?>
                               <td>
                               <a class='btn btn-danger' href="edit_options.php?question_id= <?php echo $row["question_id"];?>&id1=<?php echo $id1?>">EDIT</a>
                               <td>
                               <a class='btn btn-danger' href="delete_option.php?question_id= <?php echo $row["question_id"];?>">DELETE</a>
                               
                               <?php
                               echo"</td>";
                               ?>
                               <?php
                               echo"</td>";
                              
                               echo"</tr>";
                            }
                           ?>
                            
                                           
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


if (isset($_POST['submit1']))
 {
     $loop=0;
     $count=0;
     $res=mysqli_query($con,"SELECT * FROM questions WHERE category='$exam_category' ORDER BY question_id ASC") or die(mysqli_error($con));
     $count=mysqli_num_rows($res);
     
     if ($count==0)
     {

     }
     else
     {
         while($row=mysqli_fetch_array($res))
         {
             $loop=$loop+1;
             mysqli_query($con,"UPDATE questions set question_number='$loop' WHERE question_id=$row[question_id]");
         }
     }
     $loop=$loop+1;
    
 mysqli_query($con,"INSERT INTO questions values(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die(mysqli_error($con));
?>
<script type="text/javascript">
    alert("Question added successfully");
    window.location.href=window.location.href;
</script>
<?php
}
?>




