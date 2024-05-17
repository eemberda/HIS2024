<?php
 
    require "../config.php";
	include "../header.php";
	session_start();
	if($_SESSION["user_name"]&& $_SESSION['dr_id']) 
	               {
					   $_SESSION["user_name"]; 
	                }
	 $id=$_GET['id'];
	
	$connection = new PDO($dsn, $username, $password, $options);
	session_start();
    
				    try{
	$name=$_POST['name'];
	$license=$_POST['license'];
	echo $time_f=$_POST['time_f'];
	echo $time_t=$_POST['time_t'];
	//day
	foreach($_POST['days'] as $days){
		echo $days;
	}
	
    $gender=$_POST['gender'];
    $department=$_POST['department'];
    $experience=$_POST['experience'];
    $qual=$_POST['qualification'];
    $address=$_POST['address'];
    $state=$_POST['state'];
    $district=$_POST['district'];
    $phone=$_POST['phone'];
	$email=$_POST['email'];
   echo  $uname=$_POST['user_name'];
    $pass=$_POST['pswd'];
    $cpass=$_POST['cpswd'];
	 
	    if($pass!=$cpass)
			{
				echo "Password Mismatch!";
				$flag++;
			}
	  
	   $sql="UPDATE doctors SET name=?, gender=?, license=?, department=?,
	        qualification=?, experience=?, address=?, district=?,
			state=?, days_available=?, time_from= ?, time_to=?,
			phone=?, email=?, user_name=?, password=?,
			updated_by=? WHERE user_name=? ";
		
      $stmt= $connection->prepare($sql);
      $stmt->execute([$name,  $gender, $license, $department, $qual, $experience, $address, $district, $state, 
	                 $days, $time_f,	$time_t, $phone, $email,  $uname, $pass, $uname ,$uname]);
	  header("Location:doctor_dashboard.php");
	  echo "success";
	}
					catch(PDOException $e)
					{
						echo $sql."<br>". $e->getMessage();
						
					}
	?>