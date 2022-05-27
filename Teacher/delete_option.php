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
	$id1=$_GET["id1"];
    $category_id=$_GET["category_id"];
		mysqli_query($con,"DELETE from questions where question_id='$question_id'");
        ?>
		
		<script type="text/javascript">
    alert("Question Deleted successfully");
    window.location="add_edit_questions.php?id=<?php echo $id1 ?>";
</script>
