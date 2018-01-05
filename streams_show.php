<!-- SELECT * FROM subjects_table; -->
<!-- SELECT sbj.subject_name, sbj.subject_resources FROM subjects_table sbj, courses_table course, course_subject_table cst, department_table dpt
WHERE dpt.department_id=course.department_id AND course.course_id = cst.course_id AND cst.subject_id = sbj.subject_id AND dpt.department_id=2; -->
<?php
include_once("utility_config.php");
$subjects = all_subjects();
$subjectsVal = array();
$rowsCount = 0;

while($row = $subjects->fetch()) {
    $subjectsVal[] = $row;
    $rowsCount = $rowsCount + 1;
}
if($rowsCount>0) {
?>
<table width="100%" height="391" border="1" bgcolor="#000060">
    <tr>
        <th width="80%" scope="col">Streams</th>
    </tr>
    <tr>
        <?php
            while($row = $subjects->fetch()) {
                if($row[2] != null && $row[2] != "") {
        ?>
                    <td><iframe width="800" height="500" src="<?=$subject_stream;?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe></td>
        <?php
                }
            } ?>
    </tr>
</table>
<?php
} else {
    echo "E-Learning streams available here.";
}
?>
