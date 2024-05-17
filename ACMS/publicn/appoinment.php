

<?php 
    /*  Doctor list page
	 * Features: 
	 * Authors: Kripa John
	 *
	 */
      //include "../header.php";
      require "../config.php";
	  session_start();
	
	$connection = new PDO($dsn, $username, $password, $options);
	 $id=$_GET['id'];
	 
    /*$sel  = "Select * from patient_reg where id='$id'";*/
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
<script>
function validate()
{
var name=document.registration.name.value;
var age=document.registration.age.value;
var dname=document.registration.name.value;


if(name==""||name==null)
{
alert("name can't be blank");
document.registration.name.focus();
return false;
}
else if(age==""||age==null)
{
alert("age can't be blank");
document.registration.age.focus();
return false;
}

else if(dname==""||dname==null)
{
alert("doctorname can't be blank");
document.registration.name.focus();
return false;
}
else{
alert("successfull");
return true;
}
}
</script>
<section id="main-content">
	
	<div class="login-wrap">
	<div class="login-html">
	<div class="login-form">
	  <div class="group">

	  <form name="registration" method="POST" action="apmntaction.php" onsubmit="return validate()">
<h1>Appointment Form</h1>
<label for="Name" class="label"><b>Name</b></label>
    <input type="text" placeholder="patient name" name="name" class="input">
	</div>
	
	<div class="group">
<label for="age" class="label"><b>Age</b></label>
    <input type="text" placeholder="Enter Age" name="age" class="input" >
	</div>
	<div class="group">
<label for="gender" class="label"><b>Gender</b></label>
    <input type="radio" name="gender" value="male" name="gender" class="rad" >Male
	<input type="radio" name="gender" value="female" name="gender" class="rad" >
	Female
	</div>
	<div class="group">
<label for="appoinment" class="label"><b>Date of Appoinment</b></label>
    <input type="date" placeholder="Enter Appoinment Date" name="apntdate" class="input" >
	</div>
	<div class="group">
<label for="Doctorname" class="label"><b>Doctors Name</b></label>
<?php $num = $connection->query("select name from  doctors where dr_id='$id' ")->fetchColumn();?>
    <input type="text"   value="<?php echo $num; ?>" name="name" class="input" >
	</div>
	
	<div class="group">
<label for="Doctorid" class="label"><b>Doctors ID</b></label>	
		  <input type="text" name="id" value="<?php echo $id;  ?>" class="input" >
	</div>
	
	<div class="group">
<input type="submit" name="submit" value="Submit" class="button">
</div>
</form>
	</div>
	</div>
	</section>