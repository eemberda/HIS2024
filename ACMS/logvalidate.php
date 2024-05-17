<?php
  /*
  * Author_name: Rakhi Dayanadan
  */
    
    require "config.php";
	include "header.php";
    session_start();
	$connection = new PDO($dsn, $username, $password, $options);
	
//validation
    $name=$_POST['name'];
	
	
    $pass=$_POST['password'];
	$type_id=$_POST['type_id'];
	// Name validation
	$flag=0;              
        if(preg_match("/^[a-zA-Z -]+$/", $name) === 0)     //First Name
		    {
			   echo " <br>Name is not valid";
			   $flag++;
		    }

		if (strlen($pass) <= '6') 
		    {
                echo "Your Password Must Contain At Least 6 Characters!";
				$flag++;
            }
        else if(!preg_match("#[0-9]+#",$pass)) 
		    {
                echo "Your Password Must Contain At Least 1 Number!";
				$flag++;
            }
        else if(!preg_match("#[A-Z]+#",$pass)) 
		    {
                echo "Your Password Must Contain At Least 1 Capital Letter!";
				$flag++;
            }
        else if(!preg_match("#[a-z]+#",$pass)) 
		    {
                echo "Your Password Must Contain At Least 1 Lowercase Letter!";
				$flag++;
            }
      
				
		//Insertion
		try{
		if($flag<1)
		{
			// Redirecting the user based on type id
	if($type_id=="1")
	{
        $sel  = "Select * from admin where username='$name' and password='$pass'";
	    $statement = $connection->prepare($sel);
		
        $statement->execute();
        $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			    foreach ($result as $row)
				{ ?><center>Admin</center><br>
				<?php echo "<h2> Welcome " .($row["name"]). "</h2>"; ?>
                  <?php ($row["email"]); ?>
                  <?php //($row["dr_id"]); ?>
                  <?php  header( "Location:admin/admin_dashboard.php" ); ?>
				 </center>
<?php		}
            $_SESSION['user_name'] = $name;
			$_SESSION['type_id'] = $type_id;
			$_SESSION['dr_id'] = $row["dr_id"];
            
			
	    }
			else
			{ 
                header( "Location:login.php" );
                echo '<script language="javascript">';
                echo 'alert(Invalid Credentials)';  //not showing an alert box.
                echo '</script>';
			  	
			}	
	}
	
    else if($type_id=="2")
    {
	    $sel  = "Select * from doctors where user_name='$name' and password='$pass'";
		$statement = $connection->prepare($sel);
        $statement->execute();
        $result = $statement->fetchAll();
		if ($result && $statement->rowCount() > 0)
		    {
			    foreach ($result as $row) 
				{ 
?>
                 <tr>
				 <td> <center>Doctor</td><br><br>
                 <td><?php echo "<h2> Welcome " .($row["name"]). "</h2>"; ?></td>
                 <td><?php ($row["email"]); ?></td>
                 <td><?php  ($row["dr_id"]); ?></td>
				<?php  header( "Location:doctor/doctor_dashboard.php" ); ?>
				 </center>
<?php		}
            $_SESSION['user_name'] = $name;
			$_SESSION['type_id'] = $type_id;
			$_SESSION['dr_id'] = $row["dr_id"];
            
			
	    }
		else
		{ 
            header( "Location:login.php" );
            echo '<script language="javascript">';
            echo 'alert(Invalid Credentials)';  //not showing an alert box.
            echo '</script>';
			  	
		}
    }
  /*  else if($type_id=="3"){
    $sel  = "Select * from patient_reg where uname='$name' and pswd='$pass'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			    foreach ($result as $row) { 
?>
                <tr>
				<td> <center> Patient Management </center> </td>
                <td><?php echo "<h2> Welcome " .($row["name"]). "</h2>"; ?></td>
                <td><?php ($row["email"]); ?></td>
                <td><?php  echo ($row["id"]); ?></td>
			<?php  header( "Location:patient/patient_dashboard.php" ); ?>
				 </center>
<?php		}
            $_SESSION['user_name'] = $name;
			$_SESSION['type_id'] = $type_id;
			$_SESSION['dr_id'] = $row["dr_id"];
			}
			else
			{ 
             header( "Location:login.php" );
             echo '<script language="javascript">';
             echo 'alert(Invalid Credentials)';  //not showing an alert box.
             echo '</script>';
			  	
			}	
	}*/
else if($type_id=="4"){
    $sel  = "Select * from pharmacy where username='$name' and password='$pass'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			    foreach ($result as $row) { 
?>
                <tr>
				<td> <center>Pharmacy Management </center></td>
                <td><?php echo "<h2> Welcome " .($row["pharmacy_name"]). "</h2>"; ?></td>
                <td><?php ($row["email"]); ?></td>
                <td><?php // echo ($row["pharmacy_id"]); ?></td>
				<?php  header( "Location:pharmacy/pharmacy_dashboard.php" ); ?>
				 </center>
<?php		}
            $_SESSION['username'] = $namee;
			$_SESSION['type_id'] = $type_id;
			$_SESSION['dr_id'] = $row["dr_id"];
			}
		}
		else
		{ 
             header( "Location:login.php" );?>
            <script language="javascript">
             alert("Invalid Credentials");  //not showing an alert box.
            </script>
			  	
<?php		}	
	}
		}
		
		
		
	catch(PDOException $e)
    {
        echo $sel . "<br>" . $e->getMessage();
    }
	
	include "footer.php";
?>