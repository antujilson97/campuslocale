<div id="main_content">
<?php

include("includes/connect.php");

$select_posts = "select * from posts";

$run_posts = mysql_query($select_posts);

while($row=mysql_fetch_array($run_posts)){
	
	$post_id = $row['post_id'];
	$post_title = $row['post_title'];
	$post_date = $row['post_date'];
	$post_author = $row['post_author'];
	$post_image = $row['post_image'];
	$post_content = substr($row['post_content'],0,300);




?>

<h2>
<a href="pages.php?id=<?php echo $post_id; ?>">

<?php echo $post_title; ?>

</a>


</h2>

<p align="left"> <font size='2'>Published on: <b><?php echo $post_date; ?></font></b></p>

<p align="left"><font size='2'>Posted by: <b><?php echo $post_author; ?></font>
</b></p>

<center><img src="images/<?php echo $post_image; ?>" width=
"100" height="100" /></center>

<p align="justify"><?php echo $post_content; ?></p>

<p align="right"><a href="pages.php?id=<?php echo $post_id;
?>"><font size="3"><b>Read More</b></font></a></p>

<?php } ?>
</div>
