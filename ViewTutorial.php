<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>viewTutorial</title>
<style>
table{color:#FFFFFF;}
</style>
<script type="text/javascript">
function showSubjs()
{
  // if(comboValue == "")
  // {
  //   document.getElementById("course_details").innerHTML = "";
  //   return ;
  // }
  if (window.XMLHttpRequest) {
    // Code for IE7+, Firefox, Chrome, Opera, Safari.
    xmlHttp = new XMLHttpRequest();
  } else {
    // Code for IE6, IE5
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlHttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      document.getElementById("streams_view").innerHTML = this.responseText;
    }
  };
  // var options = course.getElementsByTagName("option");
  xmlHttp.open("GET", "streams_show.php?msg=streams", true);
  xmlHttp.send();
}
</script>
</head>
<body bgcolor="#000035" onload="showSubjs()">
<?php
include_once("utility_config.php");
if(isset($_POST['sbj']))
{
  $subject_stream = $_POST['sbj'];
}
$dept = all_departments();
$subjects = all_subjects();
$courses = all_courses();
?>
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<table width="100%" border="0" bgcolor="#000035" >
  <tr>
  <th width="19%" height="49" scope="col">Department 
    <select name="Dtype">
      <option value="0" selected>-Select-</option>
      <?php
        while($row = $dept->fetch())
        { ?>
          <option value='<?=$row[0];?>' ><?=$row[1];?></option> 
   <?php }
      ?>
    </select></th>
    <th width="13%" scope="col">
    <p align="left">Course
      <select name="course" id="course">
        <option value="-1">Select Course</option>
        <?php
          while($row = $courses->fetch())
          { ?>
            <option value='<?=$row[0];?>' ><?=$row[1];?></option>
    <?php }
        ?>
      </select>
    </p>
    </th>
    <th width="10%" scope="col">Year
      <select name="year">
        <option value="-1" selected>select..</option>
        <option value="1year">1year</option>
        <option value="1-1">1-1sem</option>
        <option value="1-2">1-2sem</option>
        <option value="2year">2year</option>
        <option value="2-1">2-1sem</option>
        <option value="2-2">2-2sem</option>
        <option value="3year">3year</option>
        <option value="3-1">3-1sem</option>
        <option value="3-2">3-2sem</option>
        <option value="4year">4year</option>
        <option value="4-1">4-1sem</option>
        <option value="4-2">4-2sem</option>
      </select>
    </th>
    <th width="11%" scope="col">
      <p>Subject 
      <select name="sbj" id="sbj">
        <option value="-1">select</option>
        <?php
          while($row = $subjects->fetch())
          { ?>
            <option value='<?=$row[2];?>' ><?=$row[1];?></option>
        <?php
          }
        ?>
      </select>
      </p>
    </th>
  </tr>
  <tr>
  <th height="407" scope="col" colspan=4>
    <div id="streams_view">E-Learning streams available here.</div>
  </th>
  </tr>
</table>
</body>
</html>
