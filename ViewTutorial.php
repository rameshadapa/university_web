<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>viewTutorial</title>
<style>
table{color:#FFFFFF;}
</style>
</head>
<body bgcolor="#000035">
<?php
include_once("utility_config.php");
if(isset($_POST['sbj']))
{
  $subject_stream = $_POST['sbj'];
}
$subjects = all_subjects();
?>
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<table width="100%" border="0" bgcolor="#000035" >
  <tr>
    <th scope="col"><h1>ViewTutorial</h1>
    <p align="left">Subject
      <label for="sbj"></label>
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
      <input type="submit" name="submit" id="submit" value="Submit" size="10" />
  </p></th>
  </tr>
  <tr>
    <th height="407" scope="col"><table width="100%" height="391" border="1" bgcolor="#000060">
      <tr>
        <th width="80%" scope="col">Streams</th>
      </tr>
      <tr>
        <?php if(isset($subject_stream) && $subject_stream != "") { ?>
          <td><iframe width="960" height="640" src="<?=$subject_stream;?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe></td>
        <?php } else { ?>
        <td>No streams available.</td>
        <?php } ?>
      </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
