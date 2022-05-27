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
    <!doctype html>
<html lang="en">
	<head>
		<title>Campus Locale</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main ">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Semester Notes</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="border mt-3">
							<table class="w-100 table-striped table-hover table-light" cellpadding="10">
                            <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type </th>
                        <th>Uploaded by</th>
                        <th>Uploaded on</th>
                        <th>Download</th>
                        
                    </tr>
                </thead>
                <?php
                

$query = "SELECT * FROM uploads WHERE file_uploaded_to = 'Computer Science' AND status = 'approved' ORDER BY file_uploaded_on DESC";
$run_query = mysqli_query($con, $query) or die(mysqli_error($con));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $file_id = $row['file_id'];
    $file_name = $row['file_name'];
    $file_description = $row['file_description'];
    $file_type = $row['file_type'];
    $file_date = $row['file_uploaded_on'];
    $file = $row['file'];
    $file_uploader = $row['file_uploader'];

    echo "<tr>";
    echo "<td>$file_name</td>";
    echo "<td>$file_description</td>";
    echo "<td>$file_type</td>";
    echo "<td><a href='viewprofile.php?name=$file_uploader' target='_blank'> $file_uploader </a></td>";
    echo "<td>$file_date</td>";
    echo "<td><a href='allfiles/$file' target='_blank' style='color:green'>Download </a></td>";
 echo "</tr>";


}
}
?>