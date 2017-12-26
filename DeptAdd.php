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


</style>

</head>
<body bgcolor="#000035">
<?php
include_once("utility_config.php");
$departments = all_departments();
if(isset($_POST['dept']))
{
  $dept_name = $_POST['dept'];
  $dept_add_status = '';
  if(add_department($dept_name) == true)
  {
    $dept_add_status = 'Department add successfully.';
  }
  else
  {
    $dept_add_status = 'Error in adding department.';
  }
}
?>
<div class="dept">
  <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
    <p><h1 align="center">AddDepartment</h1></p>
    <p>&nbsp;</p>
    <p align="center">DepartmentName 
      <label for="dept"></label>
      <input type="text" name="dept" id="dept">
      <input type="submit" name="submit" id="submit" value="Submit">
    </p>
  </form>
</div>


<div class="pagination">
  
  <a class="active" href="DeptAdd.php">Department</a>
  <a href="CourseAdd.php">Course</a>
  <a href="SubjectAdd.php">Subject</a>
  
</div>

<?php if($departments) { ?>
<div class="footer">
  <?php
    while($row = $departments->fetch())
    { ?>
      <p style="color:white;"><?=$row[0];?> &nbsp; <?=$row[1];?></p>
  <?php
    }
  ?>
</div>
<?php } ?>
</body>
</html>