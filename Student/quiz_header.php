<!doctype html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="$baseUrl/../Images/icbs_logo.png" type="image/x-icon">
    
    <!-- css style goes here -->

      <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/footer.css">
      <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- css style go to end here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;1,400;1,500&display=swap" rel="stylesheet">
  </head>
  <body>
 

    <nav class="navbar navbar-expand-lg navbar-lightheader-back sticky-top header-navbar-fonts">
      <a class="navbar-brand d-flex align-items-center" href="../index/index.php">
        
        <h3 class="text-black ml-2" href="../index/index.php">Campus Locale</h3>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> 
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="breadcome-menu">
			
            <li><div id="countdowntimer" style="display:block;"></div></li>
			
		</ul>
	</div>
      <script type="text/javascript">
        setInterval(function() {
            timer();
}, 1000);
                        function timer()
                        {
                            var xmlhttp=new XMLHttpRequest();
                            xmlhttp.onreadystatechange=function()
                            {
                            
                                if(xmlhttp.readyState==4 &&  xmlhttp.status==200)
                            {
                                if(xmlhttp.responseText=="00:00:01")
                                {
                                    window.location="result.php";
                                }
                                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
                            }
                            };
                            xmlhttp.open("GET","forajax/load_timer.php",true);
                            xmlhttp.send(null);
                        }
                    </script>
      </div>
    </nav>