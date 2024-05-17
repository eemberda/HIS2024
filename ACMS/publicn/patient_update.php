<?php
  /* Update page for Patient 
   * 
  */
    require "../config.php";
	//include "../header.php";
	session_start();
	if($_SESSION["uname"]) 
	               {
					  echo"<h2> Welcome ". $_SESSION["uname"]; 
	                }
	//echo $id=$_GET['id'];
	 $uname=$_SESSION['uname'];
	$connection = new PDO($dsn, $username, $password, $options);
	//session_start();
   /*  if($_SESSION["uname"]&& $_SESSION['type_id']) 
	               {
					   echo"<h2> Welcome ". $_SESSION["uname"]; 
	               }*/	
				    try{
						
	$name=$_POST['name'];
	$age=$_POST['age'];
    
    $address=$_POST['address'];
    $phone=$_POST['phn'];
	$email=$_POST['email'];
    
    $pass=$_POST['pswd'];
    $cpass=$_POST['cpswd'];
	 
	    if($pass!=$cpass)
			{
				echo "Password Mismatch!";
				$flag++;
			}
	  
	   echo $sql="UPDATE patient_reg SET name=?,email=?,age=?,
	         phn=?,address=?,uname=?,pswd=? WHERE uname='$uname'";
      $stmt= $connection->prepare($sql);
      echo $stmt->execute([$name, $email,  $age,$phone,$address, $uname, $pass]);
	  header( "Location: patient_dashboard.php" );
	  echo "success";
	}
					catch(PDOException $e)
					{
						echo $sql."<br>". $e->getMessage();
						
					}
	?>
	