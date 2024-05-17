<?php
require "../config.php";
   include "../header.php";
   session_start();
   $connection = new PDO($dsn, $username, $password, $options);
 
?>
<head>
<link href="../css/style.css" type="stylesheet">
</head>
<div class="reg">
<form name="registration" method="POST" onsubmit="return validate()"  action="submit.php" >
<h1>DOCTOR REGISTRATION</h1><br><hr><br>
<input type="text" name="user_type" class="fld" placeholder="2" disabled>
<label>Name:</label><input type="text" name="name" class="fld"/><br><br>
<label>MCI Reg. No.:</label><input type="text" name="license" class="fld"/><br><br>
<label>Department:</label>
<select name="department"class="fld" required>
<option>select</option>
<option value="GM">General Medicine</option>
<option value="Pediatricians">Pediatricians </option>
<option value="Gynecologists">Gynecologists</option>
 <option value="Cardiologist">Cardiologist</option>
<option value="Dermatologists">Dermatologists</option>
<option value="Family Physicians">Family Physicians</option>
<option value="Neurologists">Neurologists</option>
<option value="Orthopedic Surgeon">Orthopedic Surgeon</option>
</select><br><br>
<label>Gender:</label><br><input type="radio" name="gender" value="Male" class="rad"/>Male
             <input type="radio" name="gender" value="Female" class="rad"/>Female<br><br>
<label>Experience:</label><input type="text" name="experience" class="fld"/><br><br>
<label>Highest Qualification:</label>
<select name="qualification" class="fld" required>
<option>select</option>
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
<textarea name="address" class="fld"></textarea>
<br><br>
<label>State:</label>
<select name="state"class="fld" required>
<option>select</option>
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
<select name="district"class="fld" required>
<option>select</option>
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
<label>Email:</label><input type="email" name="email" class="fld"/><br><br>
<label>Phonenumber:</label><input type="text" name="phone" class="fld"/><br><br>
<label>Username:</label><input type="text" name="user_name" class="fld"/><br><br>
<p> Password must contain: 6 characters, 1 capital, 1 lowercase, 1 number</p><br>
<label>password:</label><input type="password" name="password" class="fld"/><br><br>
<label>confirm-password:</label><input type="password" name="cpswd" class="fld"/><br><br>
<input type="submit" value="Submit" name="submit" class="btn"/>
</form>
<a href="doct_registration.php"><input type="submit" value="Reset" name="reset" class="btn"/></a>
<a href='../login.php'><input type="submit" value="Log In" name="login" class="btn"/></a>
<?php 
 include "../footer.php";
?>
<script>
function validate()
{
	//alert("we are validating your data");
	//return false;
	var name= document.forms["registration"]["name"];
	var gender= document.forms["registration"]["gender"];
	var license= document.forms["registration"]["license"];
	var department= document.forms["registration"]["department"];
	var email= document.forms["registration"]["email"];
	var phone= document.forms["registration"]["phone"];
	var qualification= document.forms["registration"]["qualification"];
	var experience= document.forms["registration"]["experience"];	
	var user_name= document.forms["registration"]["user_name"];
	var address= document.forms["registration"]["address"];
	var district= document.forms["registration"]["district"];
	var state= document.forms["registration"]["state"];
	var password= document.forms["registration"]["password"];	
	var cpass= document.forms["registration"]["cpass"];	
    if(name.value=="")
	{
		alert("enter a valid name");
		document.forms["registration"]["name"].focus();
		return false;
	}
	else if(license.value=="")
	{
		alert("enter a valid license");
		document.forms["registration"]["license"].focus();
		return false;
	}
	else if(department.value=="")
	{
		alert("enter your department");
		document.forms["registration"]["department"].focus();
		return false;
	}
	else if(gender.value=="")
	{
		alert("enter your gender");
		document.forms["registration"]["gender"].focus();
		return false;
	}
	else if(experience.value=="")
	{
		alert("enter your experience");
		document.forms["registration"]["experience"].focus();
		return false;
	}
	else if(qualification.value=="")
	{
		alert("enter a valid qualification");
		document.forms["registration"]["qualification"].focus();
		return false;
	}
	else if(address.value=="")
	{
		alert("enter your address");
		document.forms["registration"]["address"].focus();
		return false;
	}
	else if(district.value=="")
	{
		alert("enter your district");
		document.forms["registration"]["district"].focus();
		return false;
	}
	else if(state.value=="")
	{
		alert("enter your state");
		document.forms["registration"]["state"].focus();
		return false;
	}
	else if(email.value=="")
	{
		alert("enter a valid mail id");
		document.forms["registration"]["email"].focus();
		return false;
	}
	else if(phone.value=="")
	{
		alert("enter your phone number");
		document.forms["registration"]["phone"].focus();
		return false;
	}
	else if(user_name.value=="")
	{
		alert("enter your username");
		document.forms["registration"]["user_name"].focus();
		return false;
	}
	else if(password.value=="")
	{
		alert("enter your password");
		document.forms["registration"]["password"].focus();
		return false;
	}
	else if(cpass.value=="")
	{
		alert("enter your username");
		document.forms["registration"]["cpass"].focus();
		return false;
	}
	else
		alert("Dear "+name.value);
	
}
</script>