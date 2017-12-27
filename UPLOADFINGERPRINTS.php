<html>
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Print your hallticket here.</title>
  <style>
  body{color:#FFFFFF;}
  </style>
<?php
include_once("utility_config.php");
require './vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

if(isset($_POST['SID']))
{
  $studentId = $_POST['SID'];
  $student_det = get_student_photo_fp($studentId);
  $student_fp = $student_det[1];
  
  $bucket = "user-resources-bucket";
  $key = $student_det[0];
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
  <script type="text/javascript" src="jquery-1.8.2.js"></script>
    <script type="text/javascript" src="mfs100-9.0.2.6.js"></script>
    <script type="text/javascript" src="validate.js"></script>
    <script type="text/javascript">
function load() 
{
  <?php
    if(isset($student_fp) && $student_fp != '')
    { ?>
      alert('Student fingerprint already existed.');
  <?php
    }
  ?>
}
</script>
</head>
<body bgcolor="#000035" onload="load()">
    <h1 align="center">UploadFingerPrints</h1>
    <table width="100%" height="324" border="1"  align="center" bordercolor="#000035">
  <tr>
    <th height="283" scope="col">
    
    ScanUrFinger <img name="imgFinger" id="imgFinger" width="145px" height="188px" alt="Finger image." />
    <input type="hidden" name="fingerbase64" id="fingerbase64" size="30">
    <br />
    <button class="btn btn-primary" onClick="return CaptureForPrintHT();"><strong>scan</strong></button><br/><br/>
      <input type="button" value="UploadFingerPrints" />
    </th>
  </tr>
  <tr>
    <th height="33" scope="col">
    <table width="100%" border="1">
      <tr>
        <th width="50%" height="23" scope="col">StudentID
        <form method='post' id="print_ht_form" name="print_ht_form" action="<?=$_SERVER['PHP_SELF'];?>">
          <label for="SID"></label>
          <input type="text" name="SID" id="SID">
          <input type="submit" name="button" id="button" value="Submit"></th>
        </form>  
        <th width="50%" scope="col" >
        <?php
          if(isset($studentPhoto))
          { ?>
            <image src="<?=$studentPhoto;?>" name="Simage" width="145px" height="188px" alt="studentImage" />
   <?php  }
          else
          { ?>
            <image name="Simage" width="145px" height="188px" alt="studentImage"/>
   <?php  }
        ?>
        </th>
      </tr>
    </table></th>
  </tr>
</table>
</body>
</html>