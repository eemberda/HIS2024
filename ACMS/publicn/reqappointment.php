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
	session_start();
	if($_SESSION["user_name"] && $_SESSION["dr_id"]) 
	               {
					   echo"<h2> Welcome ". $_SESSION["user_name"]; 
					   echo"<h2> Welcome ". $_SESSION["dr_id"]; 
	                }
	$connection = new PDO($dsn, $username, $password, $options);
	
	$sql="INSERT INTO appoinment_form(name, age, date_apmnt, doctname, status) VALUES("
	
	
	// Viewing Patients List
    $sel  = "Select * from doctors";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			?>
          <h2>Results</h2>
         <center><a href="patient_dashboard.php"><h5> click here to go back to</h5><h3>Home </a></h3></center>
        <table border="2px">
        <thead>
			
                <tr>
                    <th> OP Number </th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Health Issues</th>
                    <th>Place</th>
                    <th>District</th>
                    <th>Time Alloted</th>
                    
                </tr>
            </thead>
            <tbody>
<?php	    foreach ($result as $row) { 
?>
                <tr>
                <td><?php echo ($row["id"]); ?></td>
                <td><?php echo ($row["p_name"]); ?></td>
                <td><?php echo ($row["p_gender"]); ?></td>
                <td><?php echo ($row["p_health"]); ?></td>
                <td><?php  echo ($row["p_address"]); ?></td>
                <td><?php  echo ($row["p_district"]); ?></td>
                <td><?php  echo ($row["time_alloted"]); ?></td>
			</tr>
			  
        <?php } ?>
        </tbody>
		
    </table>
	
    <?php } else { ?>
        <blockquote>No results found for <?php echo escape($_POST['location']); ?>.</blockquote>
    <?php } 
 require "../footer.php" ?>