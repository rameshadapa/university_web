<?php
function validate_user($userid, $password)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT user_emailid, user_type FROM special_users_table WHERE user_emailid='$userid' and user_password='$password';";
        $result = $myPdo->query($query);
        if($row = $result->fetch())
        {
            if($row[0] == $userid)
            {
                session_start();
                $_SESSION['userid'] = $row[0];
                $_SESSION['utype']  = $row[1];
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
function upload_courses(
    $dept, $course,
    $year, $desc, $imgKey
)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "INSERT INTO course_details(course_det_year, course_det_desc,
            course_id, course_dept, course_det_res, course_doa) VALUES(
            '$year', '$desc', '$course', '$dept', '$imgKey', now());";
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
function register_student(
    $firstname, $lastname,
    $sex, $emailid, $mobileno,
    $dob, $photo, $fingerprint
)
{
    try {
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
function update_student_fp($emailId, $fingerprint)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "UPDATE student_table SET student_fingerprint='$fingerprint' WHERE student_userid='$emailId';";
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
function update_subject_resource($subjectId, $resource_url)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "UPDATE subjects_table SET subject_resources='$resource_url' WHERE subject_id='$subjectId';";
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
function register_employee(
    $firstname, $lastname,
    $sex, $userType, $qualification,
    $emailid, $mobileno,
    $dob, $photo
)
{
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $tmppwd = '';
    for($i=0; $i<7; $i++)
    {
        $tmppwd .= $chars[rand(0, strlen($chars)-1)];
    }
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "INSERT INTO special_users_table(user_emailid, user_password, user_firstname, user_lastname,
            user_gender, user_phone, user_dob, user_type, user_profile_image, user_qualification, user_doc) VALUES(
            '$emailid', '$tmppwd', '$firstname', '$lastname', '$sex[0]', '$mobileno', STR_TO_DATE('$dob', '%d/%m/%Y'), '$userType', '$photo', '$qualification', now());";
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
function get_student_photo_fp($student_id)
{
    try {
        $mypdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT student_photo, student_fingerprint FROM student_table WHERE student_userid='$student_id'";
        $result = $mypdo->query($query);
        if($row = $result->fetch())
        {
            return $row;
        }
        return null;
    } catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        return null;
    }
    return null;
}
function get_student_details($student_id)
{
    try {
        $mypdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT * FROM student_table WHERE student_userid='$student_id'";
        $result = $mypdo->query($query);
        if($row = $result->fetch())
        {
            return $row;
        }
        return null;
    } catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        return null;
    }
    return null;
}
function get_employee_details($employee_id)
{
    try {
        $mypdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT * FROM special_users_table WHERE user_emailid='$employee_id'";
        $result = $mypdo->query($query);
        if($row = $result->fetch())
        {
            return $row;
        }
        return null;
    } catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        return null;
    }
    return null;
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
        $randomstring .= $characters[rand(0, strlen($characters)-1)];
    }

    return $randomstring;
}

function add_department($department_name)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "INSERT INTO department_table(department_name) VALUES('$department_name');";
        $result = $myPdo->query($query);
        if($result == true)
        {
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
function add_course($department_id, $course_name, $course_duration)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "INSERT INTO courses_table(course_name, course_duration, department_id) VALUES('$course_name', '$course_duration', '$department_id');";
        $result = $myPdo->query($query);
        if($result == true)
        {
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
function add_subject($subject_name)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "INSERT INTO subjects_table(subject_name) VALUES('$subject_name');";
        $result = $myPdo->query($query);
        if($result == true)
        {
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
function all_departments()
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT * FROM department_table;";
        $result = $myPdo->query($query);
        return $result;
    }
    catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        return false;
    }
    return false;
}
function all_courses()
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT * FROM courses_table;";
        $result = $myPdo->query($query);
        return $result;
    }
    catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        return false;
    }
    return false;
}
function all_subjects()
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT * FROM subjects_table;";
        $result = $myPdo->query($query);
        return $result;
    }
    catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        return false;
    }
    return false;
}
function course_details($deptId, $courseId)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT * FROM course_details WHERE course_id='$courseId' AND course_dept='$deptId';";
        $result = $myPdo->query($query);
        return $result;
    }
    catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        return null;
    }
    return null;
}

function course_subject_add($course_id, $subject_id, $course_year)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "INSERT INTO course_subject_table(course_id, subject_id, course_year) VALUES('$course_id', '$subject_id', '$course_year');";
        $result = $myPdo->query($query);
        if($result == true)
        {
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

function course_subjects($course_id)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT sbj.subject_name FROM subjects_table sbj, courses_table course, course_subject_table cst
        WHERE course.course_id = cst.course_id AND sbj.subject_id = cst.subject_id AND course.course_id = $course_id;";
        $result = $myPdo->query($query);
        return $result;
    }
    catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        return false;
    }
}

function course_years($course_id)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT course_duration FROM courses_table WHERE course_id=$course_id;";
        $result = $myPdo->query($query);
        return $result;
    }
    catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        return false;
    }
    return false;
}
function course_year_subjects($course_id, $year)
{
    try {
        $myPdo = new PDO('mysql:host=localhost;dbname=university_data', 'root', 'RameshAdapa@1');
        $query = "SELECT sbj.subject_resources, sbj.subject_name FROM subjects_table sbj, courses_table course, course_subject_table cst
        WHERE course.course_id = cst.course_id AND sbj.subject_id = cst.subject_id AND course.course_id = $course_id AND cst.course_year=$year;";
        $result = $myPdo->query($query);
        return $result;
    }
    catch(PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        return false;
    }
}
?>