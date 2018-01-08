<?php
include_once("utility_config.php");

if(isset($_GET['dept_id']) && isset($_GET['course_id']))
{
    $dept_id = $_GET['dept_id'];
    $course_id = $_GET['course_id'];

    $result = course_years($course_id);
    echo "<option value='-1'>select..</option>";
    if($result)
    {
        if($row = $result->fetch())
        {
            for($idx = 0; $idx < $row[0]; $idx++)
            {
                echo "<option value='$idx'>$idx</option>";
            }
        } else {
            echo "Results are empty.";
        }
    } else {
        echo "No results found.";
    }
} else {
    echo "Invalid request.";
    echo "<option value='-1'>select..</option>";
}
?>