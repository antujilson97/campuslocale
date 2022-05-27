	<div class="row w-100">
		<button class="show-btn button-show ml-auto">
		<i class="fa fa-bars py-1" aria-hidden="true"></i>
		</button> 
	</div>
		<nav id="sidebarMenu" class="">
			<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
        		<div class="sidebar-header">
					<a class="nav-link text-dark" href="../teacher/teacher-index.php">
					<span class="home"></span>
						Staff Dashboard
					</a>
				</div>
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="../admin/display-teacher.php">
						<span data-feather="file"></span>
						Personal Profile
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/teacher-personal-information.php">
						<span data-feather="file"></span>
						 Personal Information
						</a>
						</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/teacher-courses.php">
						<span data-feather="shopping-cart"></span>
						 Teacher Courses
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/student-attendance.php">
						<span data-feather="users"></span>
						 Student Attnedance
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/class-result.php">
						<span data-feather="users"></span>
						Class Results
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../Teacher/exam_category.php">
						<span data-feather="users"></span>
						Quiz Portal
						</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="../Apptitude_Portal/login.php">
						<span data-feather="users"></span>
						 Apptitude Portal
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../Teacher/video/index.php">
						<span data-feather="users"></span>
						 Video Upload
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../teacher/teacher-password.php">
						<span data-feather="bar-chart-2"></span>
						Change Password
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../Room/">
						<span data-feather="bar-chart-2"></span>
						Lab/Room Booking 
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../Teacher/Print/Salary_Scale/index.php">
						<span data-feather="bar-chart-2"></span>
						Salary 
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../login/logout.php">
						<span data-feather="bar-chart-2"></span>
						Logout
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