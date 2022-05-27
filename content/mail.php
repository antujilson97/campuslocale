<html>
<body bgcolor="olive" text="white">
<?php
function spamcheck($field)
  {
  // Sanitize e-mail address
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  // Validate e-mail address
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }
  
  function spamcheck1($message)
  {
  if(empty($message))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }
  
    function spamcheck2($subject)
  {
  if(empty($subject))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }
  
?>

<h2 align="center">Feedback Form</h2>
<?php
// display form if user has not clicked submit
if (!isset($_POST["submit"]))
  {
  ?>
  <table border="0">
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <tr>
  <td>
  Email: <font color="red">*</font>
  </td>
  <td>
  <input type="text" name="from" placeholder="input a valid email id"><br><br>
  </td>
  </tr>
  <tr>
  <td>
  Subject: <font color="red">*</font>
  </td>
  <td>
  <input type="text" name="subject" placeholder="input your subject"><br><br>
  </td>
  </tr>
  <tr>
  <td>
  Message: <font color="red">*</font>
  </td>
  <td>
  <textarea rows="14" cols="40" name="message" placeholder="input your message"></textarea><br><br>
  </td>
  </tr>
  <tr>
  <td  align='center' colspan='12'>
  <input type="submit" name="submit" value="Submit Feedback">
  </td>
  </tr>
  </form>
  </table>
  <?php 
  }
  

  
else
  // the user has submitted the form
  {
  
  
  // Check if the "from" input field is filled out
  

  if (isset($_POST["from"]))
    {
    // Check if "from" email address is valid
    $mailcheck = spamcheck($_POST["from"]);
    if ($mailcheck==FALSE)
      {
	echo "<script>alert('Empty or invalid email id!')</script>";
	echo "<script>window.open('mail.php','_self')</script>";
    exit();
	  }
	  
	else
		if (isset($_POST["message"]))
    {
    $mailcheck1 = spamcheck1($_POST["message"]);
    if ($mailcheck1==TRUE)
      {
      
	echo "<script>alert('Message field cannot be empty!')</script>";
	echo "<script>window.open('mail.php','_self')</script>";
	exit();
      }
	 else 
	if (isset($_POST["subject"]))
    {
    $mailcheck2 = spamcheck2($_POST["subject"]);
    if ($mailcheck2==TRUE)
      {
      
	echo "<script>alert('Subject field cannot be empty!')</script>";
	echo "<script>window.open('mail.php','_self')</script>";
	exit();
      }
	  }
	  
	      else
      {
      $from = $_POST["from"]; // sender
      $subject = $_POST["subject"];
      $message = $_POST["message"];
      // message lines should not exceed 70 characters (PHP rule), so wrap it
      $message = wordwrap($message, 70);
      // send mail
      mail("vifeanyi33@gmail.com",$subject,$message,"From: $from\n");
	  	echo "<script>alert('Thank you for sending us feedback.')</script>";
	echo "<script>window.open('mail.php','_self')</script>";
      }
	  }

    }
  }
?>
</body>
</html>