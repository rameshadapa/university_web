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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#000035">
<?php
include_once("utility_config.php");
$subjects = all_subjects();
if(isset($_POST['sbj']))
{
  $subject_name = $_POST['sbj'];
  $subject_add_status = '';
  if(add_subject($subject_name) == true)
  {
    $subject_add_status = 'Department add successfully.';
  }
  else
  {
    $subject_add_status = 'Error in adding department.';
  }
}
?>

  <p>
  <h1 align="center">Add Subject</h1>
  <div align="center">
    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
    <table width="41%" border="1" bgcolor="#000060">
      <tr>
        <th width="35%" scope="col">Subject</th>
        <th width="65%" scope="col">
          <label for="sbj"></label>
          <input type="text" name="sbj" id="sbj">
        </form></th>
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
  <a  href="CourseAdd.php">Course</a>
  <a class="active" href="SubjectAdd.php">Subject</a>
</div>
</td>
</tr>
<?php if($subjects) { ?>
<tr>
<td>
  <?php
    while($row = $subjects->fetch())
    { ?>
      <p style="color:white;"><?=$row[0];?> &nbsp; <?=$row[1];?></p>
  <?php
    }
  ?>
</td>
</tr>
<?php } ?>
</table>
</body>
</html>