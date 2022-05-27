<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
        $question_id=$_GET["question_id"];
        $id1=$_GET["id1"];
        
        $question='';
        $opt1='';
        $opt2='';
        $opt3='';
        $opt4='';
        $answer='';
            $res=mysqli_query($con,"SELECT * FROM questions WHERE question_id=$question_id" );
            while($row=mysqli_fetch_array($res))
            {
                $question=$row["question"];
                $opt1=$row["opt1"];
                $opt2=$row["opt2"];
                $opt3=$row["opt3"];
                $opt4=$row["opt4"];
                $answer=$row["answer"];
                
            }
	?>
<!---------------- Session Ends form here ------------------------>




<!doctype html>
<html lang="en">
	<head>
		<title>Campus Locale</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-4 text-white admin-dashboard pl-3">
					<h4 class="">Update Questions</h4>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<form name="form1" action="" method="post">
								
							<div class="row">
								<div class="col-md-10">
									<div class="form-group">
										<label for="exampleInputEmail1">Add New Question:*</label>
										<input type="text" class="form-control" name="question" value="<?php echo $question;?>" >
									</div>
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<label for="exampleInputEmail1">Add Option 1:*</label>
										<input type="text" class="form-control" name="opt1" value="<?php echo $opt1;?>" >
									</div>
								</div>
                                <div class="col-md-10">
									<div class="form-group">
										<label for="exampleInputEmail1">Add Option 2:*</label>
										<input type="text" class="form-control" name="opt2"value="<?php echo $opt2;?>" >
									</div>
								</div>
                                <div class="col-md-10">
									<div class="form-group">
										<label for="exampleInputEmail1">Add Option 3:*</label>
										<input type="text" class="form-control" name="opt3"value="<?php echo $opt3;?>" >
									</div>
								</div>
                                <div class="col-md-10">
									<div class="form-group">
										<label for="exampleInputEmail1">Add Option 4:*</label>
										<input type="text" class="form-control" name="opt4" value="<?php echo $opt4;?>">
									</div>
								</div>
                                <div class="col-md-10">
									<div class="form-group">
										<label for="exampleInputEmail1">Add Answer:*</label>
										<input type="text" class="form-control" name="answer"value="<?php echo $answer;?>" >
									</div>
								</div>
							</div>
							
								

                            
						
							<div class="row">
								<div class="col-md-4 offset-5 mt-3">
									<button type="submit" name="submit1" value="Add Exam" class="btn btn-primary">UPDATE QUESTION</button>
								</div>
							</div>
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
    
    mysqli_query($con,"UPDATE questions set question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[answer]' WHERE question_id=$question_id");
    
 ?>
            
    
<script type="text/javascript">
    alert("Question Updated successfully");
    window.location="add_edit_questions.php?id=<?php echo $category_id ?>";
</script>
<?php
}
?>