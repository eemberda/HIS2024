<!DOCTYPE html>
<head>
<title>
</title>
</head>
<body>
<script>
function validate()
{
	var date=document.search.day.value;
	var uname1=document.search.department.value;
	
	if(date=="")
	{
		alert("date can't be blank");
		document.search.day.focus();
		return false;
	}
	if(department=="")
	{
		alert("department can't be blank");
		document.search.department.focus();
		return false;
	}
	
}
</script>
<form name="search" method="POST" onsubmit="return validate()" action="reqappointment.php">
	<input  type="date" placeholder="Date" name="day">
    <input  type="text" placeholder="Search" name="department">
    <button type="submit">Search</button>
  </form>
</body>
</html>
  