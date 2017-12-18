<?php
function validate_user($userid, $password)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT user_emailid FROM special_users_table WHERE user_emailid='$userid' and user_password='$password';";
        $result = $myPdo->query($query);
        if($row = $result->fetch())
        {
            if($row[0] == $userid)
            {
                session_start();
                $_SESSION['userid'] = $row[0];
            }
            else
            {
                exit(header("Location: ./index.php?error=Invalid user or password."));
            }
        }
        else
        {
            exit(header("Location: ./index.php?error=Invalid user or password."));
        }
    }
    catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        exit(header("Location: ./index.php"));
    }
}
function register_student(
    $firstname, $lastname,
    $sex, $emailid, $mobileno,
    $dob, $photo, $fingerprint
)
{
    try {
//        echo $sex;
//        $genger = strcmp($sex, 'male') ? 'M' : 'F';
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "INSERT INTO student_table(student_userid, student_firstname, student_lastname,
            student_phone, student_gender, student_dob, student_photo, student_fingerprint, student_doc) VALUES(
            '$emailid', '$firstname', '$lastname', '$mobileno', '$sex[0]', STR_TO_DATE('$dob', '%d/%m/%Y'), '$photo', '$fingerprint', now());";
        $result = $myPdo->query($query);
        if($result == true)
        {
#            echo $result;
            return true;
        }
        return false;
    }
    catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        return false;
    }
    return false;
}
function logout_session()
{
    session_destroy();
    exit(header("Location: ./index.php"));
}
function get_user()
{
    if(isset($_SESSION['userid']))
    {
        return $_SESSION['userid'];
    }
    return null;
}

function random_string()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomstring = '';
    for($i=0; $i<25; $i++)
    {
        $randomstring .= $characters[rand(0, strlen($characters))];
    }

    return $randomstring;
}
?>