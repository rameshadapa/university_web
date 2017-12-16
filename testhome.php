<?php
if(isset($_POST['uname']) && isset($_POST['password']))
{
    $uname=$_POST['uname'];
    $password=$_POST['password'];
    echo $uname;
    echo $password;
}
else
{
    header("Location:index.php");
}
?>