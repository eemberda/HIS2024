 <?php
  
    require "config.php";
	include "header.php";
	$connection = new PDO($dsn, $username, $password, $options);
?>
<!---------------------div----------------->
<div class="cont">
<form name="login" onsubmit="return validate()" method="post" action="logvalidate.php">
<h1>Login page</h1><br><br>

<select name="type_id" class="frm" required>
  <option disabled selected hidden>Select</option>
  <option value="1">Admin</option>
  <option value="2">Doctor</option>
</select>


</select><br><br>

<input type="text" class="frm" placeholder="Name" name="name">
<input type="text"  class="frm" placeholder="password" name="password">
<input type="Submit" class="frm-btn" value="Submit">
<input type="Submit" class="frm-btn" value="Reset"><br><br>
<b> New User</b>
<div>
</div>
<b><a href="doctor/doct_registration.php">Doctor</a></b>

</input>
    </form>
</div>

<script>
function validate(){
	var s=document.forms["login"]["type_id"].value;
	if(s=="")
	{
		alert("choose option");
		document.forms["login"]["type_id"].focus;
		return false;
		
	}
	
	var n=document.forms["login"]["name"].value;
	if(n=="")
	{
		alert("enter valid Name");
		document.forms["login"]["name"].focus;
		return false;
		
	}
	
	var p=document.forms["login"]["password"].value;
	if(p=="")
	{
		alert("enter yor password");
		document.forms["login"]["password"].focus;
		return false;
		
	}
	
	
	
}
</script>


<?php include "footer.php";?>