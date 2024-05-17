<?php
include "../header.php";
require "../config.php";
session_start();
if(isset($_SESSION["user_name"]) && isset($_SESSION["dr_id"])) {
    $_SESSION["user_name"];
    $_SESSION["dr_id"];
    $id = $_SESSION["dr_id"];
    $connection = new PDO($dsn, $username, $password, $options);
?>

<!--sidebar start-->
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
		<?php
		if( $_SESSION['type_id']) 
	               {
					   ?>
        <div class="leftside-navigation" tabindex="5000" style="overflow: hidden; outline: none;">
         <center>   
			<?php 
                $user=$_SESSION["user_name"];
				$img = $connection->query("select gender from doctors where user_name='$user'")->fetchColumn();
                if( $img=="Male"){?>
						   <img src="../img/download.jpg" width="100px" height="100px"class="prfl">
					  <?php } else{
						  ?>
						   <img src="../img/drf.png" class="prfl">
					  <?php }  
	            $lic = $connection->query("select license from doctors where user_name='$user'")->fetchColumn(); 
	            $rev= $connection->query("select review from doctors where user_name='$user'")->fetchColumn(); 
                $name = $connection->query("select name from doctors where user_name='$user'")->fetchColumn(); // Fetching the name
			    echo   "<h4>".$name."</h4>"; // Displaying the name
				echo "<h4> Doctor Id: ".$_SESSION["dr_id"]."<h4>"; 
				echo "<h4> MCI No.: ".$lic."<h4>"; 
				echo "<h1>";
				for($i=1;$i<=$rev;$i++){echo "<font color='black'>😊</font>";}
				echo "<h1>"; 
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
                    <a href="appoin_selection.php" class="dcjq-parent">
                        
                        <span>Review</span>
                    </a>
                    
                </li>
                
                <li>
                    <a href="../logout.php">
                        
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
	<p><a href="day_appoinment_list.php"><img src="../img/schedule.png"></a></p>
		<?php $num = $connection->query("select count(ap_id) from  appointmentform where dr_id='$id'")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>Today's Appoinments</h5>";?>
	</div>
	
	<div class="col">
	<p><a href=""><img src="../img/appoinment.png"></a></p>
		<?php $num = $connection->query("select count(dr_id) from  doctors where type_id='2'")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>Descriptions</h5>";?>
	</div>
	
	
	<div class="col">
	<p><a href="appoinment_request_sanction.php"><img src="../img/request.png"></a></p>
		<?php $num = $connection->query("select count(dr_id) from  doctors where type_id='2'")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>New Requests</h5>";?>
	</div>
	
    
	&nbsp; &nbsp; &nbsp;
	<div class="col">
	<marquee width="30%" direction="down" >
	<?php 
	$stmt = $connection->query("SELECT review FROM doctors");
    while ($row = $stmt->fetch()) 
	{
    echo $row['name']."<br />\n";
    echo $row['review']."<br />\n";
    }
	?>
	 This is a sample scrolling text 
	 that has scrolls texts to down.
     This is a sample scrolling text 
	 that has scrolls texts to down.
	</marquee>
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
				  }} //session close
   include "../footer.php";
	?>
