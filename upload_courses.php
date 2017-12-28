<?php
include_once("utility_config.php");
require './vendor/autoload.php';

use Aws\Credentials\CredentialProvider;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

if(isset($_POST['Dtype']) &&
   isset($_POST['SC']) &&
   isset($_POST['year']) &&
   isset($_POST['desc']))
{
    $department = $_POST['Dtype'];
    $course = $_POST['SC'];
    $semister = $_POST['year'];
    $desc = $_POST['desc'];
    $image = $_FILES['img']['tmp_name'];;


    $bucket = "user-resources-bucket";
    $key = 'uploads/courses' . '/' . random_string();

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
            'SourceFile' => $image,
            'ACL' => 'public-read',
        ]);
    } catch(S3Exception $e)
    {
        echo "Exception: $e->getMessage()\n";
    }

    if(upload_courses($department, $course, $year, $desc, $key))
    {
        echo 'Course details uploaded successfully.';
        echo '<br /><a href="./coursesUploadd.php">Click</a> to upload another course.';
    }
    else
    {
        echo 'Some problem while uploading couses, please check again.<br />';
    }
    
}
else
{
    echo 'Invalid data / some problem while processing.';
}
?>