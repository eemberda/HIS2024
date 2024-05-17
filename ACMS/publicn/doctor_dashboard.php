

<?php 
    /* Dashboard for Doctor
	 * Features: 
	 * Authors: Riya Joseph
	 *
	 */
      //include "../header.php";
      require "../config.php";
	  session_start();
	
	$connection = new PDO($dsn, $username, $password, $options);
?>

<!--sidebar start-->
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation" tabindex="5000" style="overflow: hidden; outline: none;">
         <center>   <img src="../img/f.png" class="prfl">
			<?php 
                /*if($_SESSION["uname"] && $_SESSION['type_id']) 
	               {
					   echo"<center><h4>" .$_SESSION["uname"]."</h4></center>"; 
					   
	               }*/
		    ?>
			</center>
			<ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu dcjq-parent-li">
                    <a href="student_list.php"  class="dcjq-parent">
                        
                        <span>Student Managemnet</span></a>
                    
                </li>
                
                <li class="sub-menu dcjq-parent-li">
                     
					<a href="admin_teacher.php"  class="dcjq-parent">
                        <span>Staff Managemnet</span></a>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="parent_list.php"class="dcjq-parent">
                        <span>Parent Management</span>
                    </a>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="attendance.php" class="dcjq-parent">
                        
                        <span>Attendance Managemnet </span>
                    </a>
                    
                </li>
                
                <li>
                    <a href="logout.php">
                        
                        <span>Logout Page</span>
                    </a>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
</aside>		
		
		
		<!--main content start-->
<section id="main-content">
	
	<div class="row">
	<div class="col">
	<p><a href=""><img src="../img/schedule.png"></a></p>
		<?php $num = $connection->query("select count(id) from  parent_reg ")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>Today's Appoinments</h5>";?>
	</div>
	
	<div class="col">
	<p><a href=""><img src="../img/appoinment.png"></a></p>
		<?php $num = $connection->query("select count(id) from  parent_reg ")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>Regular Patients</h5>";?>
	</div>
	
	
	<div class="col">
	<p><a href=""><img src="../img/request.png"></a></p>
		<?php $num = $connection->query("select count(id) from  parent_reg ")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>New Requests</h5>";?>
	</div>
	
    
	</div>
	<hr>
	
	<div class="row">
	<div class="col"><center>
	<p><a href="profile_edit_doctor.php"><img src="../img/edit.png"></a><br><br>Edit Profile</p>
	</center></div>
	
	
	</section>

<!--<marquee direction="right"> <img src="../img/santa.gif"></marquee>-->
<?php 
   // include "../footer.php";
	?>