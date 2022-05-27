<!---------------- Session starts form here ----------------------->
<?php  
		session_start();
		if (!$_SESSION["LoginStudent"])
		{
			header('location:../login/login.php');
		}
		if($_SESSION['LoginStudent']){
			$_SESSION['LoginAdmin'] = "";
		}
			require_once "../connection/connection.php";
			
	?>
<!---------------- Session Ends form here ------------------------>
<!doctype html>
<html lang="en">
	<head>
		<title>Student - Dashboard</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Exam Category 
				</div>
                <div class="row">
					<div class="col-md-6">
                        <?php
                        $res=mysqli_query($con,"SELECT * FROM exam_category");
                        while($row=mysqli_fetch_array($res))
                        {
                            ?>
                            <input type="button" class="btn btn-default" value="<?php echo $row["category"];?>" style="margin-top:10px;" onclick="set_exam_type_session(this.value);"> 
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function set_exam_type_session(exam_category)
                        {
                            var xmlhttp=new XMLHttpRequest();
                            xmlhttp.onreadystatechange=function()
                            {
                                if(xmlhttp.readyState==4 &&  xmlhttp.status==200)
                                {
                                   
                                    window.location="dashboard.php";
                                }
                            };
                            xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category="+exam_category,true);
                            xmlhttp.send(null);
                        }
                    </script>