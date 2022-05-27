<?php
	$conn = mysqli_connect('localhost', 'root', '', 'camloc');
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>