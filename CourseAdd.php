<html>
<head>
<style>

.dept{
	position: absolute;
	left: 330px;
	top: 86px;
	background-color:#000060;
	height: 233px;
	width: 572px;
}


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
</head>
<body bgcolor="#000035">
<?php
include_once("utility_config.php");
if(isset($_POST['department']) && isset($_POST['course']) && isset($_POST['cduration']))
{
  $dept_id = $_POST['department'];
  $course_name = $_POST['course'];
  $course_duration = $_POST['cduration'];
  $dept_add_status = '';
  if(add_course($dept_id, $course_name, $course_duration) == true)
  {
    $dept_add_status = 'Course add successfully.';
  }
  else
  {
    $dept_add_status = 'Error in adding department.';
  }
}
$departments = all_departments();
$courses = all_courses();
?>
  <p>
  <h1 align="center">Add Course</h1>
  <div align="center">
    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
    <table width="26%" border="1">
      <tr>
        <th width="39%" scope="col">Department</th>
        <th width="61%" scope="col">
          <select name="department">
            <?php while($row = $departments->fetch()) {
            ?>
            <option value='<?=$row[0];?>'><?=$row[1];?></option>
            <?php } ?>
          </select>
        </th>
      </tr>
      <tr>
        <th width="39%" scope="col">Course Name</th>
        <th width="61%" scope="col">
          <label for="course"></label>
          <input type="text" name="course" id="course">
        </th>
      </tr>
      <tr>
        <td><div align="center">Duration</div></td>
        <td>
          <label for="cduration"></label>
          <select name="cduration">
            <option value="0">select..</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <label>year(s)</label>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
          <input type="submit" name="Submit" id="Submit" value="Submit">
        </td>
      </tr>
    </table>
  </form>
  </div>
<table width="100%" border="1">
<tr>
<td>
 <div class="pagination">
  
  <a  href="DeptAdd.php">Department</a>
  <a class="active" href="CourseAdd.php">Course</a>
  <a href="SubjectAdd.php">Subject</a>
  <a href="SubjectsToCourse.php">Course subjects</a>

</div>
</td></tr>
<?php if($courses) { ?>
<tr>
  <td>
  <div class="footer">
    <?php
      while($row = $courses->fetch())
      { ?>
        <p style="color:white;"><?=$row[1];?> &nbsp; <?=$row[2];?></p>
    <?php
      }
    ?>
</div>
    </td>
    </tr>
<?php } ?>
    </table>
</body>
</html>