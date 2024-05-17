

<?php 
    /*  Doctor list page
	 * Features: 
	 * Authors: Abhijith
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
<!DOCTYPE html>
<head>
<title>
</title>
</head>
<body>
<section id="main-content">
	
	<div class="login-wrap">
	<div class="login-html">
	<div class="login-form">
	
<script>
function validate()
{
	var date=document.search.day.value;
	var uname1=document.search.department.value;
	
	if(date=="")
	{
		alert("date can't be blank");
		document.search.day.focus();
		return false;
	}
	if(department=="")
	{
		alert("department can't be blank");
		document.search.department.focus();
		return false;
	}
	
}
</script>

<form name="search" method="POST" onsubmit="return validate()" action="reqappointment.php">
	<center><label for="Date" class="label"><b>Date</b></label>
	<input  type="date" placeholder="Date" name="day" class="input"><br><br>
	<label for="Search" class="label"><b>Search Dept</b></label>
    <input  type="text" placeholder="Search" name="department" class="input"><br><br>
    <button type="submit" class="button">Search</button></center>
  </form>

  
	
	</div>
	</div>
	</div>
	
	</body>
</html>