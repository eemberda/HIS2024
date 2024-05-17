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
	//include "header.php";
	session_start();
	if($_SESSION["uname"]) 
	               {
					   $uname=$_SESSION["uname"]; 
	                }
	$connection = new PDO($dsn, $username, $password, $options);
	
    $sel  = "Select * from appointmentform where name='$uname'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			?>
          <h2>Results</h2>
         <center><a href="patient_dashboard.php"><h5> click here to go back to</h5><h3>Home </a></h3></center>
        <table>
            <thead>
			
                <tr>
                    
                    <th>Name</th>
					<th>Age</th>
                    <th>Gender</th>
                    <th>Appointment Date</th>
                    <th>Doctor name</th>
                    
					
                    

					                  

                </tr>
            </thead>
            <tbody>
<?php	    foreach ($result as $row) { 
?>
                <tr>
                
                <td><?php echo ($row["name"]); ?></td>
                <td><?php echo ($row["age"]); ?></td>
                <td><?php  echo ($row["gender"]); ?>
                <td><?php  echo ($row["date_apmnt"]); ?></td>
                <td><?php  echo ($row["doctname"]); ?></td>
				<td><input type="submit" name="submit" value="cancel"></td>
				</tr>
			  
        <?php } ?>
        </tbody>
		
    </table>
	
    <?php } else { ?>
        <blockquote>No results found</blockquote>
    <?php }
if(isset($_POST['submit'])){
		    // sql to delete a record
    $sql = "DELETE FROM appoinmentform WHERE name='$uname'";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Appointment cancelled";
    }


 //require "footer.php" ?>