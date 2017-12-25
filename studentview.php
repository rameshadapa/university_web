<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<style type="text/css">
table{
	color:#FFFFFF;
}


.flex-container{
	width: 90%;
	min-height: 500px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#FFFFFF;
	background-color: #000070;
	border-color:#FFFFFF;
	border-width:3px;

}
</style>
</head>

<body bgcolor="#000035">
<?php
include_once("utility_config.php");
require './vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

if(isset($_POST['sid']))
{
  $studentId = $_POST['sid'];
  $student = get_student_details($studentId);
  
  $bucket = "user-resources-bucket";
  $key = $student[7];
  if($key != null)
  {
    try {
      $s3Client = new S3Client([
        'version' => 'latest',
        'region' => 'ap-south-1',
        'credentials' => [
            'key' => 'key_here',
            'secret' => 'secret_here'
        ],
        'scheme' => 'http',
        'retries' => 11,
      ]);
    
      $studentPhoto = $s3Client->getObjectUrl($bucket, $key);
      echo $studentPhoto;
    } catch(S3Exception $e)
    {
        echo "Exception: $e->getMessage()\n";
    }
  }
}
?>

<form method="POST" action="<?=$_SERVER['PHP_SELF'];?>" >
<table width="50%" height="80" border="0"  align="center" bgcolor="#000070">
  <tr>
    <th width="107" height="44" scope="col">StudentID</th>
    <th width="225" scope="col"><label for="sid"></label>
      <input type="text" name="sid" id="sid" /></th>
    </tr>
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col"><button class="button"><strong>Submit</strong></button></th>
  </tr>
</table>
</form>
<div class="flex-container">
  <div align="center">
    <?php if(isset($student) && $student != null) { ?>
    <table width="100%" border="1">
      <tr>
        <th width="15%" scope="col">StudentId1</th>
        <th width="14%" scope="col">2</th>
        <th width="13%" scope="col">3</th>
        <th width="14%" scope="col">4</th>
        <th width="11%" scope="col">5</th>
        <th width="10%" scope="col">6</th>
        <th width="8%" scope="col">7</th>
        <th width="7%" scope="col">9</th>
      </tr>
      <tr>
        <th scope="col"><?=$student[1];?></th>
        <th scope="col"><?=$student[2];?></th>
        <th scope="col"><?=$student[3];?></th>
        <th scope="col"><?=$student[4];?></th>
        <th scope="col"><?=$student[5];?></th>
        <th scope="col"><?=$student[6];?></th>
        <th scope="col"><?=$student[7];?></th>
        <th scope="col"><?=$student[9];?></th>
      </tr>
    </table>
    <?php } else { ?>
      <h3 style="color:red">Invalid student id.</h3>
    <?php } ?>
  </div>
</div>






</body>
</html>
