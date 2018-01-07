<!DOCTYPE html>
<html>
<head>
<style>
    iframe{
        alignment-adjust:central;
        background-color:#fff;
        width:800px;
        height:500px;
    }
</style>
</head>
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
        <?php
            $len = count($subjectsVal);
            for($x=0; $x < $len; $x++) {
                $row = $subjectsVal[$x];
                if($row[2] != null && $row[2] != "") {
        ?>
            <tr>
                <td><iframe width="800" height="500" src="<?=$row[2];?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe></td>
            </tr>
        <?php
                }
            } ?>
</table>
<?php
} else {
    echo "E-Learning streams available here.";
}
?>
</body>
</html>