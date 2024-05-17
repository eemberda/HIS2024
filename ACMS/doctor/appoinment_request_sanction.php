

<!--
  /*
* Accept or Reject 
* Author: Riya Joseph
*/
-->  
  <style>
     table,td,th
    {
		margin:10px auto;
		border:2px solid #663300;
        border-collapse:collapse; 
        text-align:center;
        padding:20px;
        background:rgba(0,0,0,0.5);
		color:white;
    }
  th
    {
		background-color: black;
	}
h2  {
	  text-align:center;
	  color:tomato;
	}
a   {
	 text-decoration:none;
	 color:white;
	}
 </style>
 
 <?php
    require "../config.php";
	include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
	session_start();
    if($_SESSION["user_name"] && $_SESSION['dr_id']) 
	               {
					echo"<h4 style='margin:10px;margin-left:40px;'> user: ". $_SESSION["user_name"]."</h4>"; 
	               }
			$id=$_SESSION['dr_id'];
			//Forenoon Section
 	
			//Selecting students 
			$time=10.10;
        $sel= "Select * from appointmentform where dr_id='$id'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
?>
          <h2>Results</h2>
          <center>
		    <a href="doctor_dashboard.php"><h5> click here to go back to</h5>
		    <h3>Home </a></h3>
		  </center>
		  <form action="appoin_selection.php"  method="post"> 
           <table border="2px">
        <thead>
			 <tr>
			    <td colspan="5">Doctor Name: <?php echo $_SESSION['user_name']; ?></td>
			    <td colspan="5">Date : <?php echo $_SESSION['user_name']; ?></td>
			 </tr>
	
                <tr>
                    <th> OP Number </th>
                    <th>Name</th>
                    <th>Gender</th>
					<th>Age</th>
                    <th>Date</th>
                    <th>District</th>
                    <th>Time Alloted</th>
                    <th>Response</th>
                    
                </tr>
            </thead>
            <tbody>
<?php	    foreach ($result as $row) { 
?>
                <tr>
                <td><?php echo ($row["ap_id"]); ?>
				<input type="hidden" name="id" value="<?php echo ($row["id"]); ?>"></td>

               <td><?php echo ($row["name"]); ?>
			       <input type="hidden" name="name" value="<?php echo ($row["name"]); ?>"></td>
                <td><?php echo ($row["gender"]); ?>
				   <input type="hidden" name="gender" value="<?php echo ($row["gender"]); ?>"></td>
				   <td><?php  echo ($row["age"]); ?>
				<input type="hidden" name="age" value="<?php echo ($row["p_age"]); ?>"></td>
				<td><?php  echo ($row["date_apmnt"]); ?>
				<input type="hidden" name="date" value="<?php echo ($row["date_apmnt"]); ?>"></td>
			 
                 <td><?php  echo ($row["district"]); ?>
				<input type="hidden" name="district" value="<?php echo ($row["district"]); ?>"></td>
                <td><?php  
				   echo $num=$time+00.15;?>
				<input type="hidden" name="time" value="<?php echo $num; ?>"></td>
			    <td>
		     Accept<input required type="radio" name="appoi[<?php echo $row['id'] ?>]" value="Accept" checked>
             Reject<input required type="radio" name="appoi[<?php echo $row['id']; ?>]" value="Reject">
            </td>
		      </tr>
			  
        <?php } ?>
		<tr>
            <td colspan="10">
			  <a href="../doctor/appoin_selection.php">
			    <input type="submit" name="attendanceData" value="Send" class="btn">
			  </a>
			</td>
            </tr>
       
        </tbody>
		
    </table>
	</form>
<?php } 
	
		
	
else { ?>
        <blockquote>No results found for <?php echo ($_POST['location']); ?></blockquote>
         
   </form> 
     <?php } 
 require "../footer.php" ?>
