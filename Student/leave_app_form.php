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


        
  <div class="container">
   
    
  
    <form method="POST">
      
    <div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Leave Applicatiion
				</div>
      <label><b>Select Leave Type :</b></label>
      <!-- error message if type of absence isn't selected -->
      
      <div class="form-check">
      <input type="radio" name="day" id="full_day" value="full" />
      <label for="contact_email">Full Day</label>
      </div>
      <div class="form-check">
      <input type="radio" name="day" id="half_day" value="half" />
      <label for="contact_email">Half Day</label>
  
      </div>
      
      
      <div class="mb-3 ">
        <label for="dates"><b>From -</b></label>
        <input type="date" name="fromdate">
  
        <label for="dates"><b>To -</b></label>
        <input type="date" name="todate">
      </div>
  
      <div class="mb-3">
        
        <label for="leaveDesc" class="form-label"><b>Please mention reasons for your leave days :</b></label>
        <!-- error message if reason of the leave is not given -->
        
        <textarea class="form-control" name="reason" id="leaveDesc" rows="4" placeholder="Enter Here..."></textarea>
      </div>
  
  
      <input type="submit" name="submit" value="Submit Leave Request" class="btn btn-success">
      <div class="row">
					<div class="col-md-12">
						<section class="mt-3">
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="10" >
								<tr class="text-center text-black table-three table-tr-head">
									<th>No</th>
									<th>Leave Application</th>
									<th>From date</th>
									<th>To Date</th>
									
									<th>Status</th>
									
								</tr>
                            </table>
    </div>
    </form>
    
  <br>
    <label><b>Rules For Students:</b></label>
    <label>-Pupil, absent from college must produce a letter and an entry in the Regularity 
        Record of their college Diary by guardians, explaining the cause of absence.</label>
        <label>
        -A formal letter with a medical certificate is necessary in case of sickness for over three days. The student must not attend college if there is an appointment with the doctor.</label>
        <lable>-Students afflicted by the infectious diseases or exposed to such diseases at home must complete the Quarantine Period of 15 days before rejoining college. A medical fitness certificate from the attending physician must be handed over to the Class teacher at the time of rejoining the college.
A friendly attitude is to be maintained with classmates. Strict disciplinary action, such as suspension may be taken against any pupil who fights with other pupils any causes injury to them. Pupils injurious to the moral tone of the college may have to be withdrawn.</label>
<label>-All leave applications, addressed to the Principal, clearly stating the name of the pupil, class, section and session should be deposited at the Reception Desk.</label>
<label>-Irregular and insufficient attendance must be 80% of the number of college Days. Willful absentees miss out on valuable revision lessons and helpful suggestions. Such pupils may be debarred from taking the respective examination.
In case of ailment during Half yearly or Annual Examinations, guardians are to see the Principal (during hours only) with leave applications and necessary medical certificate. 
       </label> 
  </div>

  

</body>

</html>