<?php
    session_start();
	/*include "../header.php";*/
    require "../config.php";
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
					   echo"<center><h4>" .$_SESSION["uname"]."</h4></center>"; 
					   
	               }
		    ?>
			</center>
			<!--<ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu dcjq-parent-li">
                    <a href="doctors_list.php"  class="dcjq-parent">
                        
                        <span>Doctors Availability</span></a>
                    
                </li>
                
                
               <li class="sub-menu dcjq-parent-li">
                     
					<a href="appoinment.php"  class="dcjq-parent">
                        <span>Appoinment Form</span></a>
                </li>
               
                
                
                
                <li>
                    <a href="logout.php">
                        
                        <span>Logout Page</span>
                    </a>
                </li>
				
				<!--<li class="sub-menu dcjq-parent-li">
                    <a href="parent_list.php"class="dcjq-parent">
                        <span>Parent Management</span>
                    </a>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="attendance.php" class="dcjq-parent">
                        
                        <span>Attendance Managemnet </span>
                    </a>
                    
                </li>-->
				
				
          <!--  </ul> -->          
			</div>
        <!-- sidebar menu end-->
</aside>	
<?php

	/*if($_SESSION["usname"]) 
	               {
					 echo   $cname=$_SESSION["usname"]; 
	               }*/
	$usname   = $_POST['usname'];
    $pswd1    = $_POST['pswd1'];
	
	$flag=0;  
	if($flag<1)
		{
			$sel  = "Select * from patient_reg where uname='$usname' and pswd='$pswd1'";
	    $statement = $connection->prepare($sel);
        $statement->execute();
        $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			    foreach ($result as $row)
				{ ?><center><br>
				<?php echo "<h2> Welcome " .($row["name"]). "</h2>"; ?>
                  <?php ($row["email"]); ?>
                  <?php ($row["id"]); ?>
				 <div class="row">
	              <div class="col">
				     <a href="patient_dashboard.php"> Home </a>
				  </div>
				  <div class="col">
				     <a href="logout.php">Log Out </a>
				  </div>
                 
                  </center>
				  
<?php		    }
               $_SESSION['uname'] = $usname;
                //$_SESSION['type_id'] = $type_id;
               
			
			}
			else
			{ 
                header( "Location:login.php" );
                echo '<script language="javascript">';
                echo 'alert(Invalid Credentials)';  //not showing an alert box.
                echo '</script>';
			  	
			}	
	}
	
	?>
	