<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>LoginPage</title>
<style>
body{
	background-color:#000035;
}
table{
	color:#FFFFFF;
       

}
</style>


</head>
<body>
<?php
include_once('utility_config.php');
$user = get_user();
if(isset($user))
{
    exit(header("Location: ./homepage.php"));
}
?>
<form name="form1" method="post" action="homepage.php">
<center><h2 style="color:white">UserLogin</h2></center>
<table border="1" align="center">
<tr>
<td>Enter Your Name :</td>
<td><input type="text" name="uname" id="uname"/></td>
</tr>
<tr>
<td>Enter Your Password :</td>
<td><input type="password" name="password" id="password"/></td>
</tr>
<tr>
<td>Select UserType</td>
<td><select name="utype" id="utype">
<option value="Co-ordinator" seleted>Co-ordinator</option>
<option value="Admin">Admin</option>
</select>
</td>
</tr>
<tr>
<?php
if(isset($_GET['error']))
{ 
	echo "<label style='color:red'>" . $_GET['error'] . "</label><br>";
}
?>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" id="submit" value="Submit"/></td>
</table>
</form>
</body>
</html>