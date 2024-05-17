
 <head>
<link href="../css/style.css" rel="stylesheet" type="text/css" >
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
 </head>
 <?php
    require "../config.php";
	include "../header.php";
	session_start();
	if($_SESSION["user_name"]&& $_SESSION['dr_id']) 
	               {
					  $_SESSION["user_name"]; 
	                
	$connection = new PDO($dsn, $username, $password, $options);
	//echo $id=$_GET['id'];
	//echo $uname=$_SESSION['unmae'];
    $sel  = "Select * from doctors where user_name='arjun'";
	
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			?>
          
          
<?php	    foreach ($result as $row) { 
?>

<div class="reg">
<form name="registration" method="POST" action="doctor_update.php" >
<h1>EDIT PROFILE</h1><br><hr><br>
<label>Name:</label><input type="text" name="name" class="fld" value="<?php echo $row['name'];?>"/><br><br>
 <label>Gender:</label>
    <?php  if($row['gender']=="female"){
	?>
	<input type="radio" name="gender" value="Female" class="rad" checked /> Female
	<input type="radio" name="gender" value="Male" class="rad" /> Male
	<?php
	} else { 
	?>
	<input type="radio" name="gender" value="Female" class="rad" /> Female
    <input type="radio" name="gender" value="Male" class="rad" checked />Male
	<?php } ?><br><br>
	
<label>License:</label><input type="text" name="license" class="fld" value="<?php echo $row['license'];?>"/><br><br>
<label>Department:</label><input type="text" name="department" class="fld" value="<?php echo $row['department'];?>"/><br><br>
<label>Consulting Days:  </label><br>
     <input type="Checkbox" name="days[]" value="monday">Monday
     <input type="Checkbox" name="days[]" value="tuesday">Tuesday 
     <input type="Checkbox" name="days[]" value="wednesday">Wednesday <br>
     <input type="Checkbox" name="days[]" value="thursday">Thursday 
     <input type="Checkbox" name="days[]" value="friday">Friday 
     <input type="Checkbox" name="days[]" value="saturday">Saturday 
     <input type="Checkbox" name="days[]" value="sunday">Sunday 
	<br><br>
<label> Time</label><br>
<input type="time" name="time_f" class="fldx"> to <input type="time" name="time_t" class="fldx"><br><br>
<label>Experience:</label><input type="text" name="experience" class="fld" value="<?php echo $row['experience'];?>"/><br><br>
<label>Highest Qualification:</label>
<select name="qualification" class="fld" >
<option value="<?php echo $row['qualification'];?>"><?php echo $row['qualification'];?></option>
<option value="mbbs">MBBS</option>
<option value="md">MD</option>
 <option value="bams">BAMS</option>
<option value="bhms">BHMS</option>
<option value="dds">DDS</option>
<option value="dmd">DMD</option>
<option value="MS">MS</option>
</select><br><br>
<h2>PERSONAL DETAILS</h2><hr><br><br>
<label>Address</label>
<textarea name="address" class="fld" value="<?php $row['qualification']; ?>" ></textarea>
<br><br>
<label>State:</label>
<select name="state" class="fld">
<option value="<?php echo $row['state'];?>"> <?php echo $row['state'];?></option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
</select><br><br>
<label>District:</label>
<select name="district"class="fld" value="<?php echo $row['district'];?>">
<option value="<?php echo $row['district'];?>"> <?php echo $row['district'];?></option>
<option value="Alleppey">Alleppey</option>
<option value="Ernakulam">Ernakulam</option>
<option value="Idukky">Idukky</option>
<option value="Kannur">Kannur</option>
<option value="Kasargod">Kasargod</option>
<option value="Kollam">Kollam</option>
<option value="Kottayam">Kottayam</option>
<option value="Kozhicode">Kozhicode</option>
<option value="Malapuram">Malapuram</option>
<option value="Palakad">Palakad</option>
<option value="Pathanamthitta">Pathanamthitta</option>
<option value="Trissur">Trissur</option>
<option value="Trivandrum">Trivandrum</option>
<option value="Wayanad">Wayanad</option>
</select><br><br>
<label>Email:</label><input type="text" name="email" class="fld" value="<?php echo $row['email'];?>"/><br><br>
<label>Phonenumber:</label><input type="text" name="phone" class="fld" value="<?php echo $row['phone'];?>"/><br><br>
<label>Username:</label><input type="text" name="user_name" class="fld" value="<?php echo $row['user_name'];?>"/><br><br>
<p> Password must contain: 6 characters, 1 capital, 1 lowercase, 1 number</p><br>
<label>password:</label><input type="text" name="pswd" class="fld" value="<?php echo $row['password'];?>"/><br><br>
<label>confirm-password:</label><input type="password" name="cpswd" class="fld" value="<?php echo $row['password'];?>"/><br><br>
<input type="submit" value="Submit" name="submit" class="btn"/>
</form>
<a href="registration.php"><input type="submit" value="Reset" name="reset" class="btn"/></a>
<a href='doctor_dashboard.php'><input type="submit" value="Dashboard" name="login" class="btn"/></a>
	  
        <?php } ?>
       
    <?php } else { ?>
        <blockquote>No results found.</blockquote>
    <?php } 
				   }//session close
               //require "../footer.php" ?>