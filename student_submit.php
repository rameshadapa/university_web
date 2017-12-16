<?php
include_once("utility_config.php");

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $sex = $_POST['sex'];
    $emailid = $_POST['emailid'];
    $dob = $_POST['dob'];
    $mobileno = $_POST['mobileno'];
    $photo = $_POST['photo'];
    $fingerPrint = $_POST['SF'];

#    echo "$firstName $lastName $sex $emailid $mobileno $photo $fingerPrint";

    if(register_student($firstName, $lastName, $sex, $emailid, $mobileno, $dob, $photo, $fingerPrint) == true)
    {
        echo "<h3>Registration success<br /></h3>";
        echo "<h3>Register another student <a href='./StudentRegistration.html'>here</a>.</h3>";
    } 
    else {
        echo "Some problem while registring.";
    }
?>