<?php
include_once("utility_config.php");
require './vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $sex = $_POST['sex'];
    $userType = $_POST['utype'];
    $qualification = $_POST['qualification'];
    $emailid = $_POST['emailid'];
    $dob = $_POST['dob'];
    $mobileno = $_POST['mobileno'];
    $photo = $_FILES['photo']['tmp_name'];

    $bucket = "user-resources-bucket";
    $key = 'uploads/users' . '/' . random_string();

    try {
        $provider = CredentialProvider::defaultProvider();	
        $s3Client = new S3Client([
            'version' => 'latest',
            'region' => 'ap-south-1',
            'credentials' => $provider,
            'scheme' => 'http',
            'retries' => 11,
        ]);
    
        $result = $s3Client->putObject([
            'Bucket' => $bucket,
            'Key'    => $key,
            'SourceFile' => $photo,
            'ACL' => 'public-read',
        ]);
    } catch(S3Exception $e)
    {
        echo "Exception: $e->getMessage()\n";
    }

    if(register_employee($firstName, $lastName, $sex, $userType, $qualification, $emailid, $mobileno, $dob, $key) == true)
    {
        echo "<h3>Registration success<br /></h3>";
        echo "<h3>Register another employee <a href='./EmployeeRegistration.html'>here</a>.</h3>";
    } 
    else {
        echo "Some problem while registring.";
    }
?>