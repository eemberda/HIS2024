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
	if($_SESSION["user_name"] && $_SESSION["p_id"] ) 
	               {
					   $_SESSION["user_name"]; 
					    $_SESSION["p_id"]; 
	                
					
	$connection = new PDO($dsn, $username, $password, $options);
	//$id=$_GET['dr_id'];
	$date=$_POST['date'];
	$_SESSION['date']=$date;
	$dept=$_POST['department'];
    $sel  = "Select * from doctors where department='$dept' ";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			header( "Location: doctors_list.php" );
			if ($result && $statement->rowCount() > 0)
		    {
			?>
          <h2>Results</h2>
         <center><a href="patient_dashboard.php"><h5> click here to go back to</h5><h3>Home </a></h3></center>
        <table border="2px">
            <thead>
			<tr>
			<td colspan="4"> Date:  <?php echo $date; ?></td>
			<td colspan="4"> User:  <?php echo $_SESSION["user_name"]; ; ?></td>
			</tr>
                <tr>
                    <th>doctor id</th>
                    <th>Doctor Name</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Consulting Time</th>
                    <th>Experience</th>
                    <th>Review</th>
                    <th>appointment</th>

					                  

                </tr>
            </thead>
            <tbody>
<?php	    foreach ($result as $row) { 
?>
                <tr>
                <td><?php echo ($row["dr_id"]); ?></td>
                <td><?php echo ($row["name"]); ?></td>
                <td><?php echo ($row["gender"]); ?></td>
                <td><?php echo ($row["department"]); ?></td>
                <td><?php  echo ($row["time_from"]); ?> to <?php  echo ($row["time_to"]); ?></td>
                <td><?php  echo ($row["experience"]); ?></td>
                <td><?php  echo ($row["review"])." star"; ?></td>
                <td><a href='appoinment.php?id=<?=$row["dr_id"]?>'> Request Appoinment </a></td>
		      </tr>
			  <?php echo ($row['dr_id']);  ?>
        <?php } ?>
        </tbody>
		
    </table>
	
    <?php } else { ?>
        <blockquote>
		<?php 
		echo "<script>
		 
		alert('No results found');
		window.location='doctors_list.php';
		</script>"
		
?>		 <?php  ?>.</blockquote>
				   <?php } }
 require "../footer.php" ?>