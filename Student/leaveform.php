<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginStudent"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>



<!doctype html>
<html lang="en">
	<head>
		<title>Campus Locale</title>
	</head>
    <body>
    <?php include('../common/common-header.php') ?>
		<?php include('../common/student-sidebar.php') ?> 
    <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
                
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Leave Application</h4>
				</div>
                
				<div class="container pt-5">
					<div class="row">
						<div class="col-md-12">
							<form action="leaveform.php" method="post">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
                                        <label><b>Select Leave Type :</b></label>
                                        <input type="radio" name="day" id="full_day" value="full" />
                                         <label for="contact_email">Full Day</label>
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
	 								<div class="col-md-6">
										<div class="form-group pt-4 pl-5">
											<input type="submit" name="submit" value="Submit Leave Request" class="btn btn-primary">
										</div>
                                        
									</div>

                                    
								</div>
							</form>
                            
						</div>
					</div>
                    
				</div>
                
			</div>
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
        <script>
    const validate = () => {

      let desc = document.getElementById('leaveDesc').value;
      let checkbox = document.getElementsByClassName("form-check-input");
      let errDiv = document.getElementById('err');

      let checkedValue = [];
      for (let i = 0; i < checkbox.length; i++) {
        if(checkbox[i].checked === true)
          checkedValue.push(checkbox[i].id);
      }

      let errMsg = [];

      if (desc === "") {
        errMsg.push("Please enter the reason and date of leave");
      }

      if(checkedValue.length < 1){
        errMsg.push("Please select the type of Leave");
      }

      if (errMsg.length > 0) {
        errDiv.style.display = "block";
        let msgs = "";

        for (let i = 0; i < errMsg.length; i++) {
          msgs += errMsg[i] + "<br/>";
        }

        errDiv.innerHTML = msgs;
        scrollTo(0, 0);
        return;
      }
    }
  </script>
<?php 
  $reasonErr = $absenceErr = "";
  global $leaveApplicationValidate;
  if(isset($_POST['submit'])){
    if(empty($_POST['absence'])){
      $absenceErr = "Please select absence type";
      $leaveApplicationValidate = false;
    }
    else{
      $arr = $_POST['absence'];
      $absence = implode(",",$arr);
      $leaveApplicationValidate = true;
    }

    if(empty($_POST['fromdate'])){
      $fromdateErr = "Please Enter starting date";
      $leaveApplicationValidate = false;
    }
    else{
      $fromdate = mysqli_real_escape_string($conn,$_POST['fromdate']);
      $leaveApplicationValidate = true;
    }

    if(empty($_POST['todate'])){
      $todateErr = "Please Enter ending date";
      $leaveApplicationValidate = false;
    }
    else{
      $todate = mysqli_real_escape_string($conn,$_POST['todate']);
      $leaveApplicationValidate = true;
    }

    
    $reason = mysqli_real_escape_string($con,$_POST['reason']);
    if(empty($reason)){
      $reasonErr = "Please give reason for the leave in detail";
      $leaveApplicationValidate = false;
    }
    else{
      $absencePlusReason = $absence." : ".$reason;
      $leaveApplicationValidate = true;
    }
    
    $status = "Pending";
    
    if($leaveApplicationValidate){
      //for eid
      $username = $_SESSION["LoginStudent"];
      $eid_query = mysqli_query($con,"SELECT id FROM  login WHERE user_id='".$username."'");
      
      $row = mysqli_fetch_array($eid_query);
      
      $query = "INSERT INTO leaves(eid, ename, descr, fromdate, todate, status) VALUES({$row['id']},'{$username}','$absencePlusReason', '$fromdate', '$todate', '$status')";
      $execute = mysqli_query($conn,$query);
      if($execute){
        echo '<script>alert("Leave Application Submitted. Please wait for approval status!")</script>';
      }
      else{
        echo "Query Error : " . $query . "<br>" . mysqli_error($conn);;
      }
    }
  }
?>
	</body>
</html>