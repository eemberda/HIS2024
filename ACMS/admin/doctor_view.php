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
    require "config.php";
	/*include "header.php";*/
	session_start();
	/*if($_SESSION["uname"]) 
	               {
					   echo"<h2> Welcome ". $_SESSION["uname"]; 
	                }*/
	$connection = new PDO($dsn, $username, $password, $options);
	
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
                    
                    <th>Doctor Name</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Consulting Time</th>
                    <th>Experience</th>
                    <th>Review</th>
                    <th>Qualification</th>
					<th>Address</th>
					<th>Email</th>
					<th>District</th>
					<th>User Name</th>
					<th>appointment</th>

					                  

                </tr>
            </thead>
            <tbody>
<?php	    foreach ($result as $row) { 
?>
                <tr>
                
                <td><?php echo ($row["name"]); ?></td>
                <td><?php echo ($row["gender"]); ?></td>
                <td><?php echo ($row["department"]); ?></td>
                <td><?php  echo ($row["time_from"]); ?> to <?php  echo ($row["time_to"]); ?></td>
                <td><?php  echo ($row["experience"]); ?></td>
                <td><?php  echo ($row["review"]."stars"); ?></td>
				<td><?php  echo ($row["address"]); ?></td>
				<td><?php  echo ($row["email"]); ?></td>
				<td><?php  echo ($row["district"]); ?></td>
				<td><?php  echo ($row["username"]); ?></td>
				<td><?php  echo ($row["appointment"]); ?></td>
				
                <td><a href="appoinment.php"> Request Appoinment </a></td>
		      </tr>
			  
        <?php } ?>
        </tbody>
		
    </table>
	
    <?php } else { ?>
        <blockquote>No results found for <?php echo escape($_POST['location']); ?>.</blockquote>
    <?php } 
 require "footer.php" ?>