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
<table width="100%" border="0" align="center">
  <tr>
    <th width="20%" height="123" scope="col"><a href="./index.php"><img src="img/button_home.png" width="200" height="50" alt="home"></a></th>
    <th width="17%" scope="col">&nbsp;</th>
    <th width="26%" scope="col"><img src="img/DD1.png" width="161" height="121" alt="logo"></th>
    <th width="37%" scope="col">&nbsp;</th>
  </tr>
</table>
<form name="form1" method="post" action="homepage.php">
<center></center>
<table width="321" border="1" align="center" bgcolor="#000060">
<tr>
<td width="122" height="35">Enter Username :</td>
<td width="167"><input type="text" name="uname" id="uname"/></td>
</tr>
<tr>
<td height="27">Enter Password :</td>
<td><input type="password" name="password"/></td>
</tr>
<tr>
<td>Select UserType</td>
<td>
<select name="usertype">
  <option value="select">select</option>
  <option value="Admin">Admin</option>
  <option value="Co-ordinator" selected>Co-ordinator</option>
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
<td height="28"></td>
<td><input type="submit" value="submit"/></td>
</table>
</form>
</body>
</html>