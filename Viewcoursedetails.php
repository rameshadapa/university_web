<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>

<title>KKHSOU CourseDetails</title>

<style>
img:hover{
	background-color:#FFF}
	
table{
color:#FFF;
}
iframe{
	width:80%;
	height:90%;
}
</style>
<link href="css/button.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var arr = [];
// arr[0] = new Array("-select-");
// arr[1] = new Array("Ph.D/M.Phil.");
// arr[2] = new Array("MCA");
// arr[3] = new Array("Msc(IT)");
// arr[4] = new Array("MBA");
// arr[5] = new Array("MSW");
// arr[6] = new Array("ASSAME","EDUCTION","ENGLISH","POLITICAL SCIENCE","SOCILOGY","JOURNALISM AND MASSCOMMUNICATION");
// arr[7] = new Array("PGDMC","PGDHRM","PGDBI","PGDBJ","PGDBM","PGDCA");
// arr[8] = new Array("BCA"," BBA"," B.com"," BA");
// arr[9] = new Array("Florida","New York","Maryland");
// arr[10] = new Array("DIMC","DTM","DCWE","DCHN","DLIS","DSL");
// arr[11] = new Array("ASSAME","EDUCTION","ENGLISH","POLITICAL SCIENCE","SOCIOLOGY","ECONOMICS","PHILOSOPHY");

<?php
include_once("utility_config.php");
require './vendor/autoload.php';

use Aws\Credentials\CredentialProvider;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$departments = all_departments();
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

if(isset($_POST['Dtype']) && isset($_POST['SC']))
{
  $department = $_POST['Dtype'];
  $course = $_POST['SC'];
  $course_details = course_details($department, $course);

  $bucket = "user-resources-bucket";
  try {
    $provider = CredentialProvider::defaultProvider();	
    $s3Client = new S3Client([
      'version' => 'latest',
      'region' => 'ap-south-1',
      'credentials' => $provider,
      'scheme' => 'http',
      'retries' => 11,
    ]);
  } catch(S3Exception $e)
  {
      echo "Exception: $e->getMessage()\n";
  }
}

?>
function change(Dtype){
  var comboValue = Dtype.value;
  document.forms["courseDetails"].elements["SC"].options.length=0;
  for (var k in arr[comboValue]){
    var option = document.createElement("option");
    option.setAttribute('value',k);
    option.innerHTML = arr[comboValue][k];
    document.forms["courseDetails"].elements["SC"].appendChild(option);
  }
}
</script>
</head>

<body bgcolor="#000035">
<h1 align="center" style="color:white;">Course Details</h1>
<table width="100%"  cellpadding="10" cellspacing="0" border="0">
  <tr>

<!-- ============ HEADER SECTION ============== -->
<td height="100" bgcolor="#000035" style="height: 20px;"><table width="100%" border="0">
  <tr>
      <th width="19%" scope="col"></th>
      <form method="post" name="courseDetails" id="courseDetails" action="<?=$_SERVER['PHP_SELF'];?>">
      <th width="26%" height="76" scope="col">Department 
        <select name="Dtype" onChange="change(this);">
          <option value="0" selected>-Select-</option>
          <?php
          if($departments)
          {
            while($row = $departments->fetch())
            { ?>
              <option value='<?=$row[0];?>' ><?=$row[1];?></option>
            <?php
            }
          }
          ?>
          </select></th>
      <th width="20%" scope="col"><p> Courses
        <select name="SC" id="SC">
            <option value="0">-Select-</option>
          </select>
    </p></th>
      <th width="17%" scope="col">
        <!-- <a href="1home.html" target="myframe"><img src="img/home-imgs/submit.png" width="127" height="70" alt="submit"></a> -->
        <input type="submit" name="submit" id="submit" value="Submit" />
      </th>
    </form>
    <table width="100%" border="1">
    <tr>
      <th width="24%" scope="col">Course</th>
      <th width="25%" scope="col">Description</th>
      <th width="27%" scope="col">image</th>
    </tr>
      <?php if(isset($course_details) && $course_details != null) { ?>
        <?php while($row = $course_details->fetch()) { ?>
        <tr>
        <th scope="col"><?=$row[3];?></th>
        <th scope="col"><?=$row[2];?></th>
        <?php
          try {
            if($row[6] != null && $row[6] != "")
            {
              $key = $row[6];
              $studentPhoto = $s3Client->getObjectUrl($bucket, $key); ?>
              <th scope="col"><img src='<?=$studentPhoto;?>' /></th>
            <?php }
            else
            { ?>
              <th scope="col">No Image preview available.</th>
            <?php }
          } catch(S3Exception $e)
          {
              echo "Exception: $e->getMessage()\n";
          }
         ?>
        </tr>
        <?php } ?>
      <?php } else { ?>
        <tr>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
        </tr>
      <?php } ?>
  </table>
</table>
 </td>
</tr></table>
</body>

<html>

