<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>

<title>WEB PAGE TITLE GOES HERE</title>






<style>
table{
color:#FFF;
}
img{
	border-radius:90%;
	
}
iframe{
	width:98%;
	height:100%;
}


button {
    background-color: #00468C;
    border: none;
    color: white;
    padding: 14px 80px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}

div.relative {
top:1px;

	position: relative;
	width: 100%;
	height: 200px;
	border: 0px solid;
	background-color:000035;
}
div.absolute1 {
	position: absolute;
	top: 13px;
	right: 16px;
	width: 202px;
	height: 57px;
	border: 0px solid;
	background-color:  #000034;
}

div.absolute2SS {
	position: absolute;
	top: 40px;
	right: 389px;
	width: 202px;
	height: 57px;
	border: 0px solid;
	background-color:  #000034;
}


#apDiv1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 423px;
	top: 21px;
}
</style>
</head>

<body style="margin: 0px; padding: 0px; font-family: 'Trebuchet MS',verdana;">

<?php
include_once("utility_config.php");

if(!isset($_SESSION['userid']))
{
	if(isset($_POST['uname']) && isset($_POST['password']))
	{
		$uname=$_POST['uname'];
		$password=$_POST['password'];
		validate_user($uname, $password);
	}
	else
	{
		exit(header("Location: index.php"));
	}
}
?>

<table width="100%" style="height: 100%;" cellpadding="10" cellspacing="0" border="0">
<tr>

<!-- ============ HEADER SECTION ============== -->
<td height="192" colspan="2" bgcolor="#777d6a" style="height: 10px;">
<div class="relative">

<div class="absolute1">

<h1 align="right">
  <button class="button"><strong><?=$_SESSION['userid']?></strong></button>
</h1>

<h1 align="right"><button class="button"><strong><a href="./logout.php" style="color:white">Logout</a></strong></button></h1>
</div>

<div class="absolute2">
<h1 align="center"><img src="kksu.jpeg" width="163" height="139" alt="img"></h1>
</div>



</div>


</td></tr>

<tr>
<!-- ============ LEFT COLUMN (MENU) ============== -->
<td width="20%" valign="top" bgcolor="#999f8e">


<a href="employee.html" target="myframe">
    <button class="button"><strong>EmployeeRegistration</strong></button></a>
    
    <a href="StudentRegistration.html" target="myframe">
    <button class="button"><strong>StudentRegistration</strong></button></a><br>
    
    
<a href="tutorial.html" target="myframe">
    <button class="button"><strong>UploadTutorialData</strong></button></a>

<a href="MFS100/MFS100ClientService/Test/MFS100ClientServiceTest1.html" target="_parent">
    <button class="button"><strong>UploadFingerPrints</strong></button></a>

<a href="EmloyeeView.html" target="myframe">
    <button class="button"><strong>ViewEmployeeData</strong></button></a>
<a href="studentview.html" target="myframe">
    <button class="button"><strong>ViewtheStudentData</strong></button></a>

<a href="#" target="#">
    <button class="button"><strong>PrintStudentHallticket</strong></button></a>




</td>

<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<td width="80%" valign="top" bgcolor="#d2d8c7">

<iframe name="myframe">
</iframe></td></tr></table>
</body>

<html>

