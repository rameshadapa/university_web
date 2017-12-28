<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

<?php
include_once("utility_config.php");
require './vendor/autoload.php';

use Aws\Credentials\CredentialProvider;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

if(isset($_POST['emailid']) && isset($_POST['fingerbase64']))
{
    $emailid = $_POST['emailid'];
    $fingerbase = $_POST['fingerbase64'];
    $row = get_student_photo_fp($emailid);
    if($row == null)
    {
        exit(header("Location: ./printhallticketForm.php?error='Invalid user or finger prints not matched.'"));
    }
    $bucket = "user-resources-bucket";
    $key = $row[0];
    if($key != null)
    {
      try {
        $provider = CredentialProvider::defaultProvider();	
        $s3Client = new S3Client([
          'version' => 'latest',
          'region' => 'ap-south-1',
          'credentials' => $provider,
          'scheme' => 'http',
          'retries' => 11,
        ]);
      
        $studentPhoto = $s3Client->getObjectUrl($bucket, $key);
      } catch(S3Exception $e)
      {
        echo "Exception: $e->getMessage()\n";
      }
    }
}
?>
<script type="text/javascript" src="jquery-1.8.2.js"></script>
<script type="text/javascript" src="mfs100-9.0.2.6.js"></script>
<script type="text/javascript">

function VerifyFingerPrint(inputIsoTemplate, dbIsoTemplate)
{
  try {
    alert(inputIsoTemplate);
    alert(dbIsoTemplate);
    var res = VerifyFinger(inputIsoTemplate, dbIsoTemplate);
    if(res.httpStatus)
    {
        if(res.data.ErrorCode == "0")
        {
            alert(res.data.ErrorDescription);
            return true;
        }
        else
        {
            alert('Fingers does not matched.');
            return false;
        }
    }
    else
    {
        alert("Error is: "+res.err);
    }
  }
  catch(e)
  {
    alert("Exception: "+e);
  }
  return false;
}

function load() 
{
    if(VerifyFingerPrint('<?=$fingerbase;?>',
        '<?=$row[1];?>'))
    {
        alert("FingersMatched");
    }
    else
    {
        window.location.href="./printhallticketForm.php?error='Finger print does not matched.'";
    }
}
</script>
</head>
<body onload="load()">
<table width="97%" border="1" bgcolor="#000035" style="color:white;">
  <tr>
    <th width="18%" scope="col"><p><img src="img/DD1.png" alt="logo" width="190" height="161" align="left" /></p></th>
    <th width="82%" scope="col">KRISHNA KANTA HANDIQUI STATE OPEN UNIVERSITY</br>
    <p >HousefedComplex::Dispur::Guwahati-6,Assam</p>
    <p >ADMIT CARD </p></th>
  </tr>
</table>
<table width="97%" height="117" border="1" bgcolor="#000035" style="color:white;">
  <tr>
    <th width="79%" scope="col"><table width="100%" border="1"  style="color:white;">
      <tr>
        <th width="34%" height="49" scope="col"><p>Candidate name</p></th>
        <th width="66%" scope="col"><?=$emailid;?></th>
        </tr>
      <tr>
        <td><p align="center">RollNo</p>
<p>&nbsp;</p></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><p align="center">Center of Exam</p>
          <p>&nbsp;</p></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><p align="center">College</p>
          <p>&nbsp;</p></td>
        <td>&nbsp;</td>
        </tr>
    </table></th>
    <th width="21%" scope="col">
    <?php if(isset($studentPhoto)) { ?>
        <img src="<?=$studentPhoto;?>" width="201" height="222" alt="photo"/>
    <?php } else { ?>
        <img src="" width="201" height="222" alt="Photo not available"/>
    <?php } ?>
    </th>
  </tr>
</table>
</body>