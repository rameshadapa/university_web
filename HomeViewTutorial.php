<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>viewTutorial</title>
<style>
table{color:#FFFFFF;}
</style>
<script type="text/javascript">
var arr = [];
arr['-1'] = [['select..']]
<?php
include_once("utility_config.php");
if(isset($_POST['sbj']))
{
  $subject_stream = $_POST['sbj'];
}
$dept = all_departments();
$subjects = all_subjects();
$courses = all_courses();
if($courses)
{
  while($row = $courses->fetch())
  { ?>
    if(arr.hasOwnProperty('<?=$row[4];?>'))
    {
      arr['<?=$row[4];?>']['<?=$row[0];?>'] = '<?=$row[1];?>';
    }
    else
    {
      var h = new Object();
      h['<?=$row[0];?>'] = '<?=$row[1];?>';
      arr['<?=$row[4];?>'] = h;
    }
<?php }
}

?>
function courseChange(Dtype)
{
  var comboValue = Dtype.value;
  document.forms["subjectstreams"].elements["course"].options.length=0;
  for (var k in arr[comboValue]){
    var option = document.createElement("option");
    option.setAttribute('value',k);
    option.innerHTML = arr[comboValue][k];
    document.forms["subjectstreams"].elements["course"].appendChild(option);
  }
}
function courseYear(course)
{
  var dept = document.forms["subjectstreams"].elements["Dtype"];
  var courseVal = course.value;
  var deptVal = dept.options[dept.selectedIndex].value;
  if (window.XMLHttpRequest) {
    // Code for IE7+, Firefox, Chrome, Opera, Safari.
    xmlHttp = new XMLHttpRequest();
  } else {
    // Code for IE6, IE5
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlHttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
      document.forms["subjectstreams"].elements["year"].innerHTML = this.responseText;
    }
  };
  // var options = course.getElementsByTagName("option");
  xmlHttp.open("GET", "course_year.php?dept_id="+deptVal+"&course_id="+courseVal, true);
  xmlHttp.send();
}
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
  xmlHttp.open("GET", "streams_show.php", true);
  xmlHttp.send();
}
</script>
</head>
<body bgcolor="#000035" onload="showSubjs()">
<form method="post" name="subjectstreams" id="subjectstreams" action="<?=$_SERVER['PHP_SELF'];?>">
<table width="100%" border="0" bgcolor="#000035" >
  <tr>
  <th width="19%" height="49" scope="col">Department 
    <select name="Dtype" id="Dtype" onChange="courseChange(this)">
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
      <select name="course" id="course" onChange="courseYear(this)">
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
      <select name="year" id="year">
        <option value="-1" selected>select..</option>
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
    <td height=auto scope="col" colspan="4">
      <div id="streams_view">E-Learning streams available here.</div>
    </td>
  </tr>
</table>
</body>
</html>
