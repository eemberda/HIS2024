 <?php
    require "../config.php";
	include "header.php";
	$connection = new PDO($dsn, $username, $password, $options);

?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
	<!---------DIV------>
	<body style="background-image:url('img/bg.jpg');">
	<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
			<script>
			function valid()
           {
             var uname1=document.login.usname.value;
			 var password1=document.login.pswd1.value;
if(uname1==""||uname1==null)
{
alert("username can't bee blank");
document.login.usname.focus();
return false;
}
else if(password1.length<6){
alert("password must be 6");
document.login.pswd1.focus();
return false;
}
else{

return true;
}
}
</script>

			<form action="validate.php" method="post"  name="login" onsubmit="return valid()">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user"  name="usname" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="pswd1" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
				</form>
			</div>
			<div class="sign-up-htm">
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
else if(age==""||age==null)
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

else if(uname==""||uname==null)
{
alert("username can't bee blank");
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
	
<form name="registration" method="POST" action="psubmit.php" onsubmit="return validate()">
<h1 class="h"> PATIENT REGISTRATION FORM</h1>
<div class="group">
<label for="Name" class="label"><b>Name</b></label>
    <input type="text" placeholder="patient name" name="name" class="input">
	</div>
	<div class="group">
<label for="email" class="label"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" class="input" >
	</div>
	<div class="group">
<label for="age" class="label"><b>Age</b></label>
    <input type="text" placeholder="Enter Age" name="age" class="input" >
	</div>
	<br>
	<br>
	<div class="group">
<label for="gender" class="label"><b>Gender</b></label>
    <input type="radio" name="gender" value="male" name="gender" class="rad" >Male
	<input type="radio" name="gender" value="female" name="gender" class="rad" >
	Female
	</div>
	<br>
	<br>
	<div class="group">
<label for="mobile" class="label"><b>Mobile</b></label>
    <input type="text" placeholder="Enter  Mobile" name="phn" class="input" >
	</div>
	<div class="group">
<label for="address" class="label"><b>Address</b></label>
    <input type="textarea" placeholder="Enter  Current Address" name="address" class="input">
	</div>
<h2>Login Details</h2>
<div class="group">
<label for="uname" class="label"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="uname" class="input">
	</div>
	<div class="group">
<label for="password" class="label"><b>Password</b></label>
    <input type="text" placeholder="Enter a password" name="pswd" class="input">	
	</div>
	<div class="group">
<label for="confirmpassword" class="label"><b>Confirm Password</b></label>
    <input type="password" placeholder="Retype Password" name="cpswd" class="input">
	</div>
	<div class="group">
<input type="submit" name="submit" value="Submit" class="button">
</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</form>
	

</body>
<!---?php include "../footer.php";?>