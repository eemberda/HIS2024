<?php 
  /*  Registration Page
   *  Author: Kripa John
   */
   require "../config.php";
   /*include "../header.php";*/
   session_start();
   $connection = new PDO($dsn, $username, $password, $options);
  /* if($_SESSION["uname"] && $_SESSION['type_id']) 
	               {
					  $_SESSION["uname"]; 
					   $_SESSION["type_id"]; 
					   
	               }*/

?>


<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script>
function validate()
{
var name=document.registration.name.value;
var email=document.registration.email.value;
   var atposition=email.indexOf("@");
   var dotposition=email.lastIndexOf(".");
var age=document.registration.age.value;
var genderM=document.registration.gender.value;
var genderF=document.registration.gender.value;
var phonenum=document.registration.phn.value;
var address=document.registration.address.value;
var phonenum=document.registration.phn.value;
var uname=document.registration.uname.value;
var password=document.registration.pswd.value;
var password2=document.registration.cpswd.value;

if(name==""||name==null)
{
alert("name can't be blank");
document.registration.name.focus();
return false;
}
else if(atposition<1||dotposition<atposition+2||dotposition+2>=email.length)
{
alert("Please enter a valid email id");
return false;
}
if(age==""||age==null)
{
alert("age can't be blank");
document.registration.age.focus();
return false;
}
else if(genderM.checked==false && genderF.checked==false )
{
 alert("You must select male or female");
 return false;
    }
	else if(phonenum.length<10){
alert("phonenum must be 10 values");
return false;
}
else if(address==""||address==null)
{
alert("address can't be blank");
document.registration.address.focus();
return false;
}

if(uname==""||uname==null)
{
alert("username can't be blank");
document.registration.uname.focus();
return false;
}
else if(password.length<6){
alert("password must be 6");
document.registration.pswd.focus();
return false;
}
else if(password!=password2){
alert("password must be same");
return false;
}
else{
alert("successfull");
return true;
}
}
</script>

</head>
<body style="background-image:url('img/bg.jpg');">
<div class="reg">
<form name="registration" method="POST" action="psubmit.php" onsubmit="return validate()">
<h1 class="h"> PATIENT REGISTRATION FORM</h1>
<label for="Name"><b>Name</b></label>
    <input type="text" placeholder="patient name" name="name" class="fld">
<label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" class="fld" >
<label for="age"><b>Age</b></label>
    <input type="text" placeholder="Enter Age" name="age" class="fld" >
	<br>
	<br>
<label for="gender"><b>Gender</b></label>
    <input type="radio" name="gender" value="male" name="gender" class="rad" >Male
	<input type="radio" name="gender" value="female" name="gender" class="rad" >Female
	<br>
	<br>
<label for="mobile"><b>Mobile</b></label>
    <input type="text" placeholder="Enter  Mobile" name="phn" class="fld" >
<label for="address"><b>Address</b></label>
    <input type="textarea" placeholder="Enter  Current Address" name="address" class="fld">
<h2>Login Details</h2>
<label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="uname" class="fld">
<label for="password"><b>Password</b></label>
    <input type="text" placeholder="Enter a password" name="pswd" class="fld">	
<label for="confirmpassword"><b>Confirm Password</b></label>
    <input type="password" placeholder="Retype Password" name="cpswd" class="fld">
<input type="submit" name="submit" value="Submit" class="btn">
</form>
</div>
</body>
</html>