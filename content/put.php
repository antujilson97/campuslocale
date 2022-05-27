
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert</title>
</head>
<body>

<form action="put.php" method="post">

<table>

<tr>
	<td>Username:</td>
	<td><input type="text" name="user_name"></td>
</tr>

<tr>
	<td>Password:</td>
	<td><input type="password" name="user_pass"></td>
</tr>

<tr>
	<td><input type="submit" name="submit" Value="Submit Now!"></td>
</tr>

</table>

</form>




<?php
mysql_connect("localhost","root","");
mysql_select_db("victor");

if(isset($_POST['submit'])){

$uname = $_POST['user_name'];
$pword = $_POST['user_pass'];

$query="insert into admin_login(user_name,user_pass) values('$uname','$pword')";

if(mysql_query($query)){

echo "Success"; 
}

else{

echo "Failed";

}
}

?>
<br>

<table>

<tr>
<td align="center" colspan="4">Admin's</td>
</tr>

<tr>
<td>Id</td>
<td>Username</td>
<td>Password</td>
</tr>

<?php
mysql_connect("localhost","root","");
mysql_select_db("victor");

$select="select * from admin_login order by 1 DESC";

$run = mysql_query($select);

while($row=mysql_fetch_array($run)){

$id = $row['user_id'];
$u_name = $row['user_name'];
$p_word = $row['user_pass'];
?>

<?php

echo "<tr>";
echo "<td>" .$id. "</td>";
echo "<td>" .$u_name. "</td>";
echo "<td>" .$p_word. "</td>";
echo "</tr>";

?>


<?php } ?>
</table>












</body>
</html>
