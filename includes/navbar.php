<div class="black-cover-for-quiz-action"></div>
<!-- Sidebar -->
   <ul style="max-height:100vh;overflow-y:auto;overflow-x:hidden;background: linear-gradient(45deg, #2980b9, #3498db);position: absolute;position: fixed;" class="navbar-nav sidebar sidebar-dark accordion open-close-sidebar" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
   <!--  <i class="fas fa-laugh-wink"></i> -->
  </div>
  <div style="display: block;" class="sidebar-brand-text mx-3">QuizWit</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="admin_dashboard.php">
    <i class="fas fa-clipboard-list"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Action
</div>

<!-- Nav Item - Create Quiz-->
<li class="nav-item">
  <a class="nav-link collapsed" href="createquiz.php" >
    <i class="fas fa-fw fa-plus"></i>
    <span>Create Quiz</span>
  </a>
  <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Components:</h6>
      <a class="collapse-item" href="buttons.html">Buttons</a>
      <a class="collapse-item" href="cards.html">Cards</a>
    </div>
  </div> -->
</li>




<li class="nav-item">
  <a class="nav-link" href="admin_profile.php">
    <i class="fas fa-user-tie"></i>
    <span>Admin Profile</span></a>
</li>



<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <?php
  $control = 0;
  $quizControl = 0;
    $sql = "SELECT * FROM quizes WHERE admin_email_id='$_SESSION[admin_id]'";
    $result = mysqli_query($conn,$sql);
    while($row = $result->fetch_assoc()){
      $quizControl  = 1;
      $sql = "SELECT * FROM question_bank WHERE quiz_id='$row[quiz_id]'";
      $res = mysqli_query($conn,$sql);
      if($res->num_rows>0)
        {$control = 1;
        break;}
    }
  ?>
<?php if($quizControl){?>
  <a id="quiz-action-toggle" class="nav-link" href="#">
    <i class="fas fa-tools"></i>
    <span>Quiz Action</span>
  </a>
<?php }?>
  <div class="quiz-action-menu" >
    <div style="border : 0.5px solid #cbb09b;">
      <h6 class="collapse-header">Action:</h6>
      <?php if($control){?>
      <a class="collapse-item" href="exam_status.php">Quiz Status</a>
      <a class="collapse-item" href="public_access.php">Public Access</a>
      <a class="collapse-item" href="questionnaire.php">Update Quiz</a>
      <?php }?>
      <a class="collapse-item" href="delete_exam.php">Delete Quiz</a>
      <a class="collapse-item" href="expand_questionnaire.php">Expand Quiz</a>
      <?php if($control){?>
      <a class="collapse-item" href="show_feedback.php">Feedback received</a>
    <?php }?>
    </div>
  </div>
</li>

<!-- Divider -->


<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pages</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Login Screens:</h6>
      <a class="collapse-item" href="login.html">Login</a>
      <a class="collapse-item" href="register.html">Register</a>
      <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
      <div class="collapse-divider"></div>
      <h6 class="collapse-header">Other Pages:</h6>
      <a class="collapse-item" href="404.html">404 Page</a>
      <a class="collapse-item" href="blank.html">Blank Page</a>
    </div>
  </div>
</li> -->

<!-- Nav Item - Leaderboard -->
<?php 
if($control){
?>
<li class="nav-item">
  <a class="nav-link" href="leaderboard.php">
    <i class="fas fa-list-ol"></i>
    <span>Leaderboard</span></a>
</li>
<?php 
}
?>
<!--   Nav Item - About us -->

<li class="nav-item">
  <a class="nav-link" href="contact_us.php">
    <i class="far fa-comments"></i>
    <span>Contact Us</span></a>
</li>

<!-- Any extra item -->

</ul>
<!-- End of Sidebar -->

<div class="left-padding" style="width:280px;height: 100%;"></div>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav style="z-index: 2;width: 100%;position: absolute;left: 0;top:0;position: fixed;height: 50px;" class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->

          <!-- Topbar Search -->
        <!--   <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="search">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" >
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            
            <!-- Nav Item - User Information -->
            <li style="position: absolute;right: 2px;top:-12px;" class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  
               <?php echo $_SESSION['name']; ?>
                  <?php 

                    $sql = "SELECT * FROM profile_photo WHERE admin_email='$_SESSION[email]'";
                    $result = mysqli_query($conn,$sql);
                    
                    if($result->num_rows==1)
                    {
                      $row = $result->fetch_assoc();
                      $image_name = $row['image_name'];
                    }
                    else $image_name = "default_image.png";
                  ?>
                </span>
                <span class="p-img-c" >
                  <img id="menu-circle-photo"  src="profile_photo/<?php echo $image_name; ?>" style="max-width:100%;">
                </span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="change_password.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>-->
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="admin_logout.php" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
                
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  
  
<script>
  let quizActionToggle = 1;
  function quizActionToggleUtility(){
    if(quizActionToggle){
      document.getElementsByClassName('quiz-action-menu')[0].style.display = 'block'
      document.getElementsByClassName('black-cover-for-quiz-action')[0].style.display = 'block'
    }
    else{
      document.getElementsByClassName('quiz-action-menu')[0].style.display = 'none'
      document.getElementsByClassName('black-cover-for-quiz-action')[0].style.display = 'none'
    }
    quizActionToggle = !quizActionToggle
  }
  document.getElementById('quiz-action-toggle').addEventListener('click', () => {
    quizActionToggleUtility()
  })
  document.getElementsByClassName('black-cover-for-quiz-action')[0].addEventListener('click', () => {
    quizActionToggleUtility()
  })
</script>
