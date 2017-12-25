<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<style type="text/css">
img {
    border-radius: 90px;
	
}

.flex-container1{
	width: 90%;
	min-height: 200px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#FFFFFF;
	background-color: #000035;

}


.flex-container{
	width: 90%;
	min-height: 580px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#FFFFFF;
	background-color: #000035;

}
.flex-container .column{
	padding: 10px;
	background: #000035;
	-webkit-flex: 1; /* Safari */
	-ms-flex: 1; /* IE 10 */
	flex: 1; /* Standard syntax */
}
.flex-container .column.bg-alt{
	background: #000035;
}
.flex-container .column.bg-alt1{
	background: #000035;
	
}


.flex-container .column.bg-alt11{
	background: #000035;
}
.flex-container .column.bg-alt12{
	background: #FF0;
	
}

button {
    background-color: #00468C;
    border: none;
    color: white;
    padding: 5px 80px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}


button1 {
    background-color: #00468C;
    border: none;
    color: white;
    padding: 5px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 1px;
    cursor: pointer;
}



section
{
	width: 90%;
	min-height: 40px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */
	display: flex; /* Standard syntax */
	color:#FFFFFF;
	background-color:#F00;
	}




footer
{
    width: 90%;
	min-height: 20px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color: #FFF;
	background-color: #000075 ;
	}


content
	{
width: 90%;
	min-height: 200px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#00000;
	background-color:#000035;
	}
	
div.relative {
	position: relative;
	width: 100%;
	height: 200px;
	border: 0px solid;
	background-color:000035;
} 

div.absolute {
	position: absolute;
	top: 2px;
	left: 0px;
	width: 100%;
	height: 21px;
	border: 0px solid;
	background-color:  #000034;
}

div.absolute1 {
	position: absolute;
	top: 80px;
	right: 193px;
	width: 582px;
	height: 94px;
	border: 0px solid;
	background-color:  #000034;
}


div.absolute2 {
	position: absolute;
	top: 4px;
	right: 8px;
	width: 175px;
	height: 51px;
	border: 0px solid;
	background-color:  #000034;
}
div.absolute3 {
	position: absolute;
	top: 303px;
	right: 4px;
	width: 290px;
	height: 188px;
	border: 0px solid;
	font-size:12px;
	background-color:  #00468C;
}





nav {
    float: left;
    max-width: 40px;
    margin: 0;
    padding: 1em;
	color:#FFFFFF;
	background-color:#000035;
}

nav ul {
    list-style-type: none;
    padding: 0;
    
}
   
nav ul a {
    text-decoration: none;
}

article {
    margin-left: 170px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
    background-color:#FFFFFF;
   width:100%;
}

iframe
{
	color:#FFFFFF;
	border:dotted;
	width:100%;
}



    
    </style>



</head>

<body>
<?php
include_once("utility_config.php");
require './vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

if(isset($_POST['eid']))
{
  $employeeId = $_POST['eid'];
  $employee = get_employee_details($employeeId);
  
  $bucket = "user-resources-bucket";
  $key = $employee[9];
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
    
      $employeePhoto = $s3Client->getObjectUrl($bucket, $key);
      echo $employeePhoto;
    } catch(S3Exception $e)
    {
        echo "Exception: $e->getMessage()\n";
    }
  }
}
?>
<div class="flex-container1">
<div class="relative">
<div class="absolute">
  <div align="center"><strong>WELCOME TO KRISHNA KANTA HANDIQUI OPEN UNIVERSITY</strong> </div>
</div>
<div class="absolute1">
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<table width="532" border="1">
  <tr>
    <th width="127" scope="col">EmployeeID</th>
    <th width="144" scope="col"><label for="sid"></label>
      <input type="text" name="eid" id="eid" /></th>
    <th width="239" scope="col"><button class="button"><strong>Submit</strong></button></th>
  </tr>
</table>
</form>
</div>
</div>
</div>
<div class="flex-container">
<?php if(isset($employee) && $employee != null) { ?>
    <table width="100%" border="1">
      <tr>
        <th width="15%" scope="col">EmployeeId</th>
        <th width="14%" scope="col">2</th>
        <th width="13%" scope="col">3</th>
        <th width="14%" scope="col">4</th>
        <th width="11%" scope="col">5</th>
        <th width="10%" scope="col">6</th>
        <th width="8%" scope="col">7</th>
        <th width="8%" scope="col">8</th>
        <th width="7%" scope="col">9</th>
      </tr>
      <tr>
        <th scope="col"><?=$employee[1];?></th>
        <th scope="col"><?=$employee[2];?></th>
        <th scope="col"><?=$employee[3];?></th>
        <th scope="col"><?=$employee[4];?></th>
        <th scope="col"><?=$employee[5];?></th>
        <th scope="col"><?=$employee[6];?></th>
        <th scope="col"><?=$employee[7];?></th>
        <th scope="col"><?=$employee[8];?></th>
        <th scope="col"><?=$employee[9];?></th>
      </tr>
    </table>
    <?php } else { ?>
      <h3 style="color:red">Invalid employee id.</h3>
    <?php } ?></div>
</body>
</html>
