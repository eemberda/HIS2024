

<?php 
    /* Dashboard for Patients
	 * Features: 
	 * Authors: Kripa John
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
                if($_SESSION["uname"]) 
	               {
					   echo"<center><h4>name" .$_SESSION["uname"]."</h4></center>"; 
					   
	               }
		    ?>
			</center>
			<ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="patient_dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu dcjq-parent-li">
                    <a href="doctors_list.php"  class="dcjq-parent">
                        
                        <span>Doctors Availability</span></a>
                    
                </li>
                
                
                
                <li>
                    <a href="login.php">
                        
                        <span>Logout Page</span>
                    </a>
                </li>
				 <!--<li class="sub-menu dcjq-parent-li">
                    <a href="parent_list.php"class="dcjq-parent">
                        <span>Parent Management</span>
                    </a>
                </li>
				<li class="sub-menu dcjq-parent-li">
                     
					<a href="appoinment.php"  class="dcjq-parent">
                        <span>Appoinment Form</span></a>
                </li>
               
                <li class="sub-menu dcjq-parent-li">
                    <a href="attendance.php" class="dcjq-parent">
                        
                        <span>Attendance Managemnet </span>
                    </a>
                    
                </li>-->
            </ul>            </div>
        <!-- sidebar menu end-->
</aside>		
		
		
		<!--main content start-->
<section id="main-content">
	
	<div class="row">
	<!--<div class="col">
	<p><a href=""><img src="../img/schedule.png"></a></p>
		<!?php $num = $connection->query("select count(id) from  patient_reg ")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>Today's Appoinments</h5>";?>
	</div>
	
	<div class="col">
	<p><a href=""><img src="../img/appoinment.png"></a></p>
		<!?php $num = $connection->query("select count(id) from  patient_reg ")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>Regular Patients</h5>";?>
	</div>
	
	
	<div class="col">
	<p><a href=""><img src="../img/request.png"></a></p>
		<!?php $num = $connection->query("select count(id) from  patient_reg ")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>New Requests</h5>";?>
	</div>
	-->
    
	</div>
	<hr>
	
	<div class="row">
	<div class="col"><center>
	
	<p><a href='pedit_form.php'><img src="../img/edit.png">Edit Profile</a><br><br></p>
	</center></div>
	<?php //echo $row['id'];  ?>
	
	</section>

<!--<marquee direction="right"> <img src="../img/santa.gif"></marquee>-->
<?php 
   // include "../footer.php";
	?>