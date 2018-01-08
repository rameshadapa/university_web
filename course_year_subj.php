<?php
include_once("utility_config.php");

if(isset($_GET['course_id']) && isset($_GET['year']))
{
    $course_id = $_GET['course_id'];
    $year = $_GET['year'];

    $result = course_year_subjects($course_id, $year);
    echo "<option value='-1'>select..</option>";
    if($result)
    {
        while($row = $result->fetch())
        {
            echo "<option value='$row[0]'>$row[1]</option>";
        }
    }
} else {
    echo "<option value='-1'>select..</option>";
}
?>