<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Add Subject to course</title>
<style type="text/css">
body,td,th {
	color: #FFF;
}
.pagination {
    display: inline-block;
}
.pagination a {
    color: #FFF;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}
.pagination a.active {
    background-color: #4CAF50;
    color: white;
}
.pagination a:hover:not(.active) {background-color: #ddd;}
.footer {
    padding: 1em;
    color: white;
    background-color: #000060;
    clear: left;
    text-align: center;
}
</style>
<script type="text/javascript">
var arr = [];
<?php
include_once("utility_config.php");
$courses = all_courses();
$subjects = all_subjects();
$courseVals = array();

if(isset($_POST['course']) && isset($_POST['cduration']) && isset($_POST['csubject']))
{
  $course = $_POST['course'];
  $duration = $_POST['cduration'];
  $subject = $_POST['csubject'];
  $status = '';
  $error = '';
  if(course_subject_add($course, $subject, $duration) == true)
  {
    $status = "<p style='color:green;'>subject attached to given course successfully.</p>";
  } else {
    $status = "<p style='color:red;'>some error while attaching subject to course.</p>";
  }
}

if($courses)
{
  while($row = $courses->fetch())
  { 
    $courseVals[] = $row;
  ?>
    arr['<?=$row[0];?>']= '<?=$row[2];?>';
<?php 
  }
}
?>
function change(course){
  var comboValue = course.value;
  document.forms["courseSubjects"].elements["cduration"].options.length=0;
  for (var k=1; k<=arr[comboValue]; k++){
    var option = document.createElement("option");
    option.setAttribute('value',k);
    option.innerHTML = k;
    document.forms["courseSubjects"].elements["cduration"].appendChild(option);
  }

  if(comboValue == "")
  {
    document.getElementById("course_details").innerHTML = "";
    return ;
  }
  if (window.XMLHttpRequest) {
    // Code for IE7+, Firefox, Chrome, Opera, Safari.
    xmlHttp = new XMLHttpRequest();
  } else {
    // Code for IE6, IE5
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlHttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      document.getElementById("course_details").innerHTML = this.responseText;
    }
  };
  var options = course.getElementsByTagName("option");
  xmlHttp.open("GET", "course_subjects.php?course="+comboValue+"&courseName="+options[course.selectedIndex].innerHTML, true);
  xmlHttp.send();
}
</script>
</head>
<body bgcolor="#000035">
<table width="100%" border="1">
  <tr>
    <th scope="col">Add Subject To course</th>
  </tr>
</table>
<div align="center">
  <table width="21%" height="152" border="1">
    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>" id="courseSubjects" name="courseSubjects">
    <tr>
      <th width="39%" height="28" scope="col">SelectCourse</th>
      <th width="61%" scope="col"><label>
        <select name="course" id="course" onChange="change(this);">
          <option value="-1">Select</option>
          <?php
            $len = count($courseVals);
            for($x=0; $x < $len; $x++) {
            $row = $courseVals[$x];
          ?>
            <option value='<?=$row[0];?>'><?=$row[1];?></option>
          <?php } ?>
        </select>
      </label></th>
    </tr>
    <tr>
      <td><strong>Course year</strong></td>
      <td><div>
        <select name="cduration" id="cduration">
          <option value="-1">select</option>
        </select>
      </div></td>
    </tr>
    <tr>
      <td><strong>SelectSubject</strong></td>
      <td><div>
        <select name="csubject" id="csubject">
          <option value="-1">select</option>
          <?php while($row = $subjects->fetch()) {
            ?>
            <option value='<?=$row[0];?>'><?=$row[1];?></option>
          <?php } ?>
        </select>
      </div></td>
    </tr>
    <tr>
      <?php if(isset($status)) { ?>
        <td height="28"><?=$status;?></td>
      <?php } else { ?>
        <td height="28">&nbsp;</td>
      <?php } ?>
      <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
    </form>
  </table>
</div>
<table width="100%" border="1">
<tr>
  <td>
<div class="pagination">
  <a href="DeptAdd.php">Department</a>
  <a href="CourseAdd.php">Course</a>
  <a href="SubjectAdd.php">Subject</a>
  <a class="active" href="SubjectsToCourse.php">Course subjects</a>
</div>
</td>
</tr>
<?php if($subjects) { ?>
<tr>
<td>
  <div id="course_details"><b>Course subjects will display here.</b></div>
</td>
</tr>
<?php } ?>
</table>
</body>
</html>
