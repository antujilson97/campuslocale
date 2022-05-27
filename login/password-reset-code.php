<?php include('../Connection/connection.php');
if (isset($_POST['password_reset_link']))
{
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $token=md5(rand());

    $check_mail="SELECT email FROM student_info WHERE email='$email' LIMIT 1";
    $check_mail_run=mysqli($con,$check_mail);
    if(mysqli_num_rows($check_mail_run)>0)
    {
        $row=mysqli_fetch_array($check_mail_run);
        $get_first_name=$row['first_name'];
        $get_last_name=$row['last_name'];
        $get_email=$row['email'];
    }
    else
    {
        $_SESSION['status']="No email Found";
        header("Location:password-reset.php");
        exit(0);
    }
}
 ?>