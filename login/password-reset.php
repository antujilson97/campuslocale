

<!doctype html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>Campus Locale</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
	<div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                
                <div class="card">
                    <div class="card-header">
                        <h5>Password Reset</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="password-reset-code.php" method="POST">

                       
                        <div class="form-group mb-3">
                            <label>Email ID:</label>
                            <input type="text" id="email" class="form-control" placeholder="Enter your registered email">
</div>
                        
                        
                        <div class="form-group mb-3">
                            <button type ="submit" name="password_reset_link"  class="btn btn-primary">Send Password Reset Link</button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        function sendEmail(){
            Email.send({
    Host : "smtp.gmail.com",
    Username : "antujilsonparayil24@gmail.com",
    Password : "Antu@8012",
    To : 'contactmeatcampuslocale@gmail.com',
    From : document.getElementById("email").value,
    Subject : "Enquiry From Campus Locale",
    Body : "Name:" +document.getElementById("name").value 
          +"<br>Phone no:" +document.getElementById("phone").value 
          +"<br>Message:" +document.getElementById("message").value 
}).then(
  message => alert("Message Sent Succesfully")
);
        }
    </script>
    </body>
    </html>
    