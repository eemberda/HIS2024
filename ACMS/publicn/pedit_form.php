<?php
require "../config.php";
 $connection = new PDO($dsn, $username, $password, $options);
 
session_start();
  if($_SESSION['uname']){
	     echo $_SESSION['uname'];
  }
	$uname=$_SESSION['uname']; 
	
	//$id=$_GET['id'];
    $sel  = "Select * from patient_reg where uname='$uname'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
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
                    <a href="attendance.php" class="dcjq-parent">
                        
                        <span>Attendance Managemnet </span>
                    </a>
                    
                </li>-->
            </ul>            </div>
        <!-- sidebar menu end-->
</aside>	
<div class="login-wrap">
	<div class="login-html">
	<div class="login-form">
<div class="group">			
<?php foreach($result as $row) {
?>
<form action="patient_update.php" method="POST">

<label for="Name" class="label"><b>Name</b></label>
    <input type="text" value="<?php echo ($row["name"]);?>" name="name" class="input">
	</div>
	<div class="group">
<label for="email" class="label"><b>Email</b></label>
    <input type="text" value="<?php echo ($row["email"]);?>" name="email" class="input" >
	</div>
	<div class="group">
<label for="age" class="label"><b>Age</b></label>
    <input type="text" value="<?php echo ($row["age"]);?>" name="age" class="input" >
	</div>
	<br>
	<br>
	<div class="group">
<label for="mobile" class="label"><b>Mobile</b></label>
    <input type="text" value="<?php echo ($row["phn"]);?>" name="phn" class="input" >
	</div>
	<div class="group">
<label for="address" class="label"><b>Address</b></label>
    <input type="textarea" value="<?php echo ($row["address"]);?>" name="address" class="input">
	</div>
<h2>Change Password</h2>

	<div class="group">
<label for="password" class="label"><b>Password</b></label>
    <input type="text" placeholder="Enter new password" value="<?php //echo ($row["pswd"]);?>" name="pswd" class="input">	
	</div>
	<div class="group">
<label for="confirmpassword" class="label"><b>Confirm Password</b></label>
    <input type="password" value="<?php //echo ($row["cpswd"]);?>" name="cpswd" class="input">
	</div>
	<div class="group">
<input type="submit" name="submit" value="Save Changes" class="button">
</div>
</form>
	<?php } ?>
	</div>
	</div>
	</div>
	
<?php } ?>