<?php
include_once("utility_config.php");

if(isset($_POST['user_id']) &&
   isset($_POST['fingerbase64']))
{
  $emailId = $_POST['user_id'];
  $fingerPrint = $_POST['fingerbase64'];
  if($emailId != "" && $fingerPrint != "")
  {
    if(update_student_fp($emailId, $fingerPrint))
    {
      echo "Student $emailId finger print updated successfully.<br />";
      echo "<a href='./UPLOADFINGERPRINTS.php'>Click</a> to add another student details.";
    }
    else
    {
      echo "Some error while submitting student finger print.";
    }
  }
  else
  {
    echo 'Please privide valid user email and finger prints.<br /><a href="./UPLOADFINGERPRINTS.php">Click</a> to go back.';
  }
}
?>