<?php
    
    require "../config.php";
	/*include "../header.php";*/
     session_start();
	$connection = new PDO($dsn, $username, $password, $options);
	if($_SESSION["user_name"] && $_SESSION['p_id']) 
	               {
					 echo   $cname=$_SESSION["uname"]; 
					 echo   $id=$_SESSION["p_id"]; 
	               }
				   
	$name=$_POST['name'];
	echo $id_x=$_POST['id'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$apntdate=$_POST['apntdate'];
	$doctname=$_POST['doctname'];
	
	
	
	//$sel = "Select * from appointmentform where email='$email'";
			/*$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();*/
			$sel="INSERT INTO appointmentform(id, name,age,gender,date_apmnt,doc_name, dr_id) 
			VALUES ('$id','$name','$age','$gender',
			'$apntdate','$doctname', '$id_x')";
			$connection->exec($sel);
			echo "onClick returnConfirm 'Registered Succesfully...'";
		    header( "Location: patient_dashboard.php" );
           
	/*include "../footer.php";*/
?>