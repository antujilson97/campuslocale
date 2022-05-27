<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <div class="app-sidebar sidebar-shadow">
    <button class="show-btn button-show ml-auto">
      <i class="fa fa-bars py-1" aria-hidden="true"></i>
    </button> 
  </div>
    <nav id="sidebarMenu" class="">
			<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
        <div class="sidebar-header">
          <div class="nav-item">
              <a class="nav-link text-black" href="../admin/adminindex.php">
                <span class="home"></span>
                <i class="fa fa-home mr-2" aria-hidden="true"></i>  Admin Dashboard
              </a>
          </div>
        </div>   
        <ul class="nav flex-column">
          <li class="app-sidebar__heading">
            <a class="nav-link" href="../admin/Teacher.php">
              <span data-feather="file"></span>
              <i class="fa fa-user mr-2" aria-hidden="true"></i>Teacher Registration
            </a>
		      </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/Student.php">
              <span data-feather="shopping-cart"></span>
              <i class="fa fa-user mr-2" aria-hidden="true"></i>Student Registration
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/Courses.php">
              <span data-feather="users"></span>
              <i class="fa fa-book mr-2" aria-hidden="true"></i>Courses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/subjects.php">
              <span data-feather="bar-chart-2"></span>
              <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i>Subjects
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/time-table.php">
              <span data-feather="layers"></span>
              <i class="fa fa-clock-o mr-2" aria-hidden="true"></i>Time Table
            </a>
		  
          <li class="nav-item">
            <a class="nav-link" href="../admin/teacher-salary.php">
              <span data-feather="layers"></span>
              <i class="fa fa-money mr-2" aria-hidden="true"></i>Teacher Salary
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/sendemail.php">
              <span data-feather="layers"></span>
              <i class="fa fa-users mr-2" aria-hidden="true"></i>Send Messages
            </a>
          </li>
          
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/teacher-attendance.php">
              <span data-feather="layers"></span>
              <i class="fa fa-check-square mr-2" aria-hidden="true"></i> Teacher Attendance
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/student-fee.php">
              <span data-feather="layers"></span>
              <i class="fa fa-credit-card-alt mr-2" aria-hidden="true"></i>Student Fee
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../idcard/index.php">
              <span data-feather="layers"></span>
              <i class="fa fa-credit-card-alt mr-2" aria-hidden="true"></i>ID Generator
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/manage-accounts.php">
              <span data-feather="layers"></span>
              <i class="fa fa-key mr-2" aria-hidden="true"></i> Manage Account
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Room/admin/index.php">
              <span data-feather="layers"></span>
              <i class="fa fa-home" aria-hidden="true"></i>Factuality Bookings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/videoupload.php">
              <span data-feather="layers"></span>
              <i class="fa fa-sign-out" aria-hidden="true"></i> Video Upload
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../login/logout.php">
              <span data-feather="layers"></span>
              <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
            </a>
          </li>
         
        </ul>
      </div>
    </nav>

    <script>
        const toggleBtn = document.querySelector(".show-btn");
        const sidebar = document.querySelector(".sidebar");
        // undefined
        toggleBtn.addEventListener("click",function(){
            sidebar.classList.toggle("show-sidebar");
        });
    </script>