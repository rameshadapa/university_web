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
if(isset($_GET['resource'])) {
$resource = $_GET['resource'];
?>
<table width="100%" height="391" border="1" bgcolor="#000060">
    <tr>
        <th width="80%" scope="col">Streams</th>
    </tr>
    <tr>
        <td align="center"><iframe width="100%" height="500" src="<?=$resource;?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe></td>
    </tr>
</table>
<?php
} else {
    echo "E-Learning streams available here.";
}
?>
</body>
</html>