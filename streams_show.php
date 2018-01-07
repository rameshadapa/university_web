<!DOCTYPE html>
<html>
<body>
<?php
include_once("utility_config.php");

$subjects = all_subjects();
$subjectsVal = array();
$rowCount = 0;
?>
<?php
if($subjects)
{
    while($row = $subjects->fetch()) {
        $subjectsVal[] = $row;
        $rowCount++;
    }
}
if(isset($_GET['msg']))
{
    $message = $_GET['msg'];
}
if($rowCount > 0) {
?>
<table width="100%" height="391" border="1" bgcolor="#000060">
    <tr>
        <th width="80%" scope="col">Streams</th>
    </tr>
    <tr>
        <?php
            $len = count($subjectsVal);
            for($x=0; $x < $len; $x++) {
                $row = $subjectsVal[$x];
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
</body>
</html>