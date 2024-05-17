	<?php
		/* Action page for Patient Registration
		 * Email and Phone Number will be validated
		 * Server side validation
		 * Author: Kripa John,Abhijith M Shaji
		 */
		require "../config.php";
		/*include "../header.php";*/
		 session_start();
		$connection = new PDO($dsn, $username, $password, $options);
		/*if($_SESSION["uname"] && $_SESSION['type_id']) 
					   {
						 echo   $cname=$_SESSION["uname"]; 
					   }*/
					   
		$name=$_POST['name'];
		$email=$_POST['email'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$phone=$_POST['phn'];
		$address=$_POST['address'];
		$uname=$_POST['uname'];
		$pass=$_POST['pswd'];
		$cpass=$_POST['cpswd'];		   
				

		$flag=0; 
		// Name validation
		$flag=0;              
			if(preg_match("/^[a-zA-Z -]+$/", $name) === 0)     //First Name
				{
				   echo " <br>Name is not valid";
				   $flag++;
				}
		//Email Validation
			if (filter_var($email, FILTER_VALIDATE_EMAIL))
				{
				   // echo("$email is a valid email address");
				}
			else 
				{
				   echo("<br> $email is not a valid email address");
					$flag++;
				}
		//Gender Validation
			if(empty($gender))
			   {
				  echo "Select your gender";
				  $flag++;
			   }
			if($age=="")
			   {
				   echo "Enter age";
				   $flag++;
			   }
			
			if($address=="")
			   {
				   echo "Enter a valid address";
				   $flag++;
			   }
		//	if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone))
			 if($phone=="")
				{
					echo "not valid";
				  // $phone is valid
				  $flar++;
				}
				
			if(preg_match("/^[a-zA-Z -]+$/", $uname) === 0)     //User Name
				{
				   echo " <br>User Name is not valid";
				   $flag++;
				}
			if (strlen($pass) <= '6') 
				{
					echo "Your Password Must Contain At Least 6 Characters!";
					$flag++;
				}
			elseif(!preg_match("#[0-9]+#",$pass)) 
				{
					echo "Your Password Must Contain At Least 1 Number!";
					$flag++;
				}
			elseif(!preg_match("#[A-Z]+#",$pass)) 
				{
					echo "Your Password Must Contain At Least 1 Capital Letter!";
					$flag++;
				}
			elseif(!preg_match("#[a-z]+#",$pass)) 
				{
					echo "Your Password Must Contain At Least 1 Lowercase Letter!";
					$flag++;
				}
			if($pass!=$cpass)
				{
					echo "Password Mismatch!";
					$flag++;
				}
						
					   
					   //Insertion
			try{
			if($flag<1)
			{
				$sel = "Select * from patient_reg where email='$email'";
				$statement = $connection->prepare($sel);
				$statement->execute();
				$result = $statement->fetchAll();
				if ($result && $statement->rowCount() > 0) {
					echo "Email already Exist";
					echo "<a href='login.php'>Try again</a>";
					
					
				}
				else
				{
				$sel = "Select * from patient_reg where phn='$phone'";
				$statement = $connection->prepare($sel);
				$statement->execute();
				$result = $statement->fetchAll();
				if ($result && $statement->rowCount() > 0) {
					echo "Phone already Exist";
					echo "<a href='login.php'>Try again</a>";
				}
				else
				{
					
				$sel="INSERT INTO patient_reg(name,email,age,gender,phn,address,
				uname, pswd) VALUES ('$name','$email','$age',
				'$gender','$phone','$address','$uname','$pass')";
				$connection->exec($sel);
				echo "onClick returnConfirm 'Registered Succesfully...'";
				header( "Location: login.php" );
			   }
			}}}
		catch(PDOException $e)
		{
			echo $sel . "<br>" . $e->getMessage();
		}
		/*include "../footer.php";*/
	?>