<?php
include_once("utility_config.php");

if(isset($_GET['course_id']) && isset($_GET['year']))
{
//    $dept_id = $_GET['dept_id'];
    $course_id = $_GET['course_id'];
    $year = $_GET['year'];

    $result = course_year_subjects($dept_id, $course_id, $year);
    echo "<option value='-1'>select..</option>";
    if($result)
    {
        if($row = $result->fetch())
        {
            echo "<option value='$row[0]'>$row[1]</option>";
        }
    }
} else {
    echo "<option value='-1'>select..</option>";
}
?>