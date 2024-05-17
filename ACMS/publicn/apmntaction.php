<?php
    /* Action page for Patient Registration
	 * Email and Phone Number will be validated
	 * Server side validation
	 * Author: Kripa John
	 */
    require "../config.php";
	/*include "../header.php";*/
     session_start();
	$connection = new PDO($dsn, $username, $password, $options);
	/*if($_SESSION["uname"]) 
	               {
					 echo   $cname=$_SESSION["uname"]; 
	               }*/
				   
	$name=$_POST['name'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$apntdate=$_POST['apntdate'];
	$doctname=$_POST['doctname'];
	
	
	
	//$sel = "Select * from appointmentform where email='$email'";
			/*$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();*/
			$sel="INSERT INTO appointmentform(name,age,gender,date_apmnt,doctname) 
			VALUES ('$name','$age','$gender',
			'$apntdate','$doctname')";
			$connection->exec($sel);
			echo "onClick returnConfirm 'Registered Succesfully...'";
		    header( "Location: patient_dashboard.php" );
           
	/*include "../footer.php";*/
?>