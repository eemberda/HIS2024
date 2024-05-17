<?php
    
    require "../config.php";
	include "../header.php";
    
	$connection = new PDO($dsn, $username, $password, $options);
	
//validation
    $name=$_POST['name'];
	$license=$_POST['license'];
    $gender=$_POST['gender'];
    $department=$_POST['department'];
    $experience=$_POST['experience'];
    $qualification=$_POST['qualification'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
	$email=$_POST['email'];
	$district=$_POST['district'];
	$state=$_POST['state'];
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    $cpass=$_POST['cpswd'];
	
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
	    if($department=="")
		   {
			   echo "Enter a valid department";
			   $flag++;
		   }
	    if($experience=="")
		   {
			   echo "Enter your experience";
			   $flag++;
		   }
		if($qualification=="")
		   {
			   echo "Enter a valid Qualification";
			   $flag++;
		   }
	    if($address=="")
		   {
			   echo "Enter a valid address";
			   $flag++;
		   }
		   if($district=="")
		   {
			   echo "Enter a valid district";
			   $flag++;
		   }
		   if($state=="")
		   {
			   echo "Enter a valid state";
			   $flag++;
		   }
		//if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone))
		 if($phone=="")
			{
				echo "not valid";
              // $phone is valid
            }
			//else
			//{
			  //  echo "Not a valid number";
			//	$flag++;
			//}
		if(preg_match("/^[a-zA-Z -]+$/", $user_name) === 0)     //User Name
		    {
			   echo " <br>User Name is not valid";
			   $flag++;
		    }
		if (strlen($password) <= '6') 
		    {
                echo "Your Password Must Contain At Least 6 Characters!";
				$flag++;
            }
        elseif(!preg_match("#[0-9]+#",$password)) 
		    {
                echo "Your Password Must Contain At Least 1 Number!";
				$flag++;
            }
        elseif(!preg_match("#[A-Z]+#",$password)) 
		    {
                echo "Your Password Must Contain At Least 1 Capital Letter!";
				$flag++;
            }
        elseif(!preg_match("#[a-z]+#",$password)) 
		    {
                echo "Your Password Must Contain At Least 1 Lowercase Letter!";
				$flag++;
            }
        if($password!=$cpass)
			{
				echo "Password Mismatch!";
				$flag++;
			}
				
		//Insertion
		try{
		if($flag<1)
		{
			$sel = "Select * from doctors where email='$email'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0) {
				echo "Email already Exist";
				echo "<a href='doct_registration.php'>Try again</a>";
				
				
			}
			else
			{
			$sel = "Select * from doctors where phone='$phone'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0) {
				echo "Phone already Exist";
				echo "<a href='doct_registration.php'>Try again</a>";
			}
			else
			{
			$sel = "Select * from doctors where user_name='$user_name'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0) {
				echo "username already Exist";
				echo "<a href='doct_registration.php'>Try again</a>";
			}
			else
			{
				
		    $sql="INSERT INTO doctors(name,license, department, email, phone, gender, address,experience, 
			qualification,district,state, user_name, password) VALUES ('$name','$license', '$department','$email','$phone','$gender','$address','$experience','$qualification','$district','$state', '$user_name','$password')";
			$connection->exec($sql);
			echo "onClick returnConfirm 'Registered Succesfully...'";
		    header( "Location: login.php/" );
           }
		}}}}
	catch(PDOException $e)
    {
       echo $sql . "<br>" . $e->getMessage();
   }
	include "../footer.php";
?>