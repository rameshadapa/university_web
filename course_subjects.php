<?php
include_once("utility_config.php");
if(isset($_GET['course']))
{
    $course = $_GET['course'];
    $courseName = $_GET['courseName'];
    $result = course_subjects($course);
    echo "<table><tr><th>Subjects for " . $courseName . "</th><th></th></tr>";
    while($row = $result->fetch())
    {
        echo "<tr>";
        echo "<td></td><td>" . $row[0] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>