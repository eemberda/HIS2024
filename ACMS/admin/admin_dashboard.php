

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
         <center>  <?php 
                $user=$_SESSION["user_name"];
				$img = $connection->query("select gender from patient_reg where uname='$user'")->fetchColumn();
                if( $img=="Male"){?>
						   <img src="../img/download.jpg" width="100px" height="100px"class="prfl">
					  <?php } else{
						  ?>
						   <img src="../img/drf.png" class="prfl">
					  <?php } ?>
			<?php 
                if($_SESSION["uname"]) 
	               {
					   echo"<center><h4>" .$_SESSION["uname"]."</h4></center>"; 
					   
	               }
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
                    <a href="doctor_view.php"  class="dcjq-parent">
                        
                        <span>Doctor Managemnet</span></a>
                    
                </li>
                
                <li class="sub-menu dcjq-parent-li">
                     
					<a href="admin_teacher.php"  class="dcjq-parent">
                        <span>Patient Managemnet</span></a>
                </li>
                
                <li class="sub-menu dcjq-parent-li">
                    <a href="attendance.php" class="dcjq-parent">
                        
                        <span>Appoinments Managemnet </span>
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
		<?php $num = $connection->query("select count(dr_id) from  doctors ")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>Doctors</h5>";?>
	</div>
	
	<div class="col">
	<p><a href=""><img src="../img/appoinment.png"></a></p>
		<?php $num = $connection->query("select count(ap_id) from  appointmentform ")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>Regular Patients</h5>";?>
	</div>
	
	
	<div class="col">
	<p><a href=""><img src="../img/request.png"></a></p>
		<?php $num = $connection->query("select count(id) from  patient_reg ")->fetchColumn();
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