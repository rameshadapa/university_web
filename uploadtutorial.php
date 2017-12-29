<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style>
table{
	color:#FFFFFF;
}
</style>
</head>

<body bgcolor="#000035">
<div align="center">
<?php
include_once("utility_config.php");
if(isset($_POST['sub']) && isset($_POST['url']))
{
  $subject = $_POST['sub'];
  $url = $_POST['url'];
  $status = '';
  if($url != "")
  {
    if(update_subject_resource($subject, $url))
    {
      $status = "<p style='color:green'>Course uploaded successfully.</p>";
    }
    else
    {
      $status = "<p style='color:red'>Invalid subject.</p>";
    }
  }
  else 
  {
    $status = "<p style='color:red'>Empty resource link.</p>";
  }
}
$subjects = all_subjects();
?>
  <table width="35%" height="252" border="1">
    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
    <tr>
      <th width="46%" scope="col">&nbsp;</th>
      <th width="54%" scope="col"><div align="left">UploadTutorial</div></th>
    </tr>
    <tr>
      <td>Select Subjects</td>
      <td><label for="sbj"></label>
        <select name="sbj" id="sbj">
        <option value="-1" selected>-Select-</option>
        <?php
          while($row = $subjects->fetch())
          { ?>
            <option value="<?=$row[0];?>"><?=$row[1];?></option>
          <?php
          }
          ?>
        </select></td>
    </tr>
    <tr>
      <td>Upload Tutorial Url</td>
      <td><label for="url"></label>
      <input type="text" name="url" id="url" /></td>
    </tr>
    <tr>
      <?php if(isset($status)) { ?>
        <td><?=$status;?></td>
      <?php } else { ?>
        <td>&nbsp;</td>
      <?php } ?>
      <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
    </tr>
    </form>
  </table>
</div>
</body>
</html>
