<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>

<title>WEB PAGE TITLE GOES HERE</title>




<style>
strong{color: #FFF;}
</style>


<link href="css/login_home_css.css" rel="stylesheet">
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
<td height="192" colspan="2" bgcolor="white" style="height: 10px;">


<table width="100%" border="1" bgcolor="#000035">
  <tr>
    <th width="80%" height="200" scope="col"><img src="img/bgimg1.png" alt="logo" width="100%" height="200" align="middle"> </th>
    <th width="20%" scope="col"><strong><?=$_SESSION['userid']?></strong><BR/><br/>
<button class="button"><strong><a href="./logout.php" style="color:white">Logout</a></strong></button>
</th>
  </tr>
</table>



</td></tr>

<tr>
<!-- ============ LEFT COLUMN (MENU) ============== -->
<td width="20%" valign="top" bgcolor="#000035">

<table height="70%" border="0" bgcolor="#FFFFFF">
  <tr>
    <td width="231" height="0" >
<a href="StudentRegistration.html" target="myframe">
    <img src="img/Stdreg.png" width="100%" height="48" border="0"/></a></td>
  </tr>
  <?php if($_SESSION['utype'] == 0) { ?>
  <tr>
    <td height="43"> <p><a href="employee.html" target="myframe">
      <img src="img/emp11.png" width="100%" height="48"/></a><br>
      </p></td>
  </tr>
  <?php } ?>
  <tr>
    <td height="43"><p><a href="coursesUploadd.php" target="myframe">
      <img src="img/CourseDetails.png" width="100%" height="48"/></a></p></td>
  </tr>
  
  <tr>
    <td height="43"><a href="uploadtutorial.html" target="myframe">
    <img src="img/UploadTutorialsData.png" width="100%" height="48"/></a></td>
  </tr>
  <tr>
    <td height="43"><a href="printhallticketForm.php" target="myframe">
     <img src="img/printHallticket.png" width="100%" height="48"/></a></td>
  </tr>
  <tr>
    <td ><a href="UPLOADFINGERPRINTS.php" target="myframe">
    <img src="img/uploadFingerPrints.png" width="100%" height="48"/></a></td>
  </tr>
  <tr>
    <td height="43">
    
    <a href="studentview.php" target="myframe">
    <img src="img/viewStudentetails.png" width="100%" height="48"/></a></td>
  </tr>
  <?php if($_SESSION['utype'] == 0) { ?>
  <tr>
    <td height="43">
    <a href="EmloyeeView.php" target="myframe">
    <img src="img/ViewEmployeeDetails.png" width="100%" height="48"/></a></td>
  </tr>
  <?php } ?>
  <tr>
    <td height="43"><a href="studentview.php" target="myframe">
    <img src="img/ViewCourseDetails1.png" width="100%" height="48"/></a></td>
  </tr>
  <tr>
    <td height="43"><a href="DeptAdd.php" target="myframe">
    Add Department</a></td>
  </tr>
  <tr>
    <td height="43"><a href="Elearningvideos.html" target="myframe"><img src="img/ViewTutorial1.png" width="100%" height="48"/></a></td>
  </tr>
</table>









</td>

<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<td width="80%" height="90%" valign="top" bgcolor="#d2d8c7">

<iframe name="myframe">
</iframe></td></tr></table>
</body>

</html>

