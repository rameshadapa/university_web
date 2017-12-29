<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>

<title>KKHSOU CourseDetails</title>

<style>
img:hover{
	background-color:#FFF}
	
table{
color:#FFF;
}
img{
	border-radius:90%;
	
}
iframe{
	width:80%;
	height:90%;
}
</style>
<link href="css/button.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var arr = [];
// arr[0] = new Array("-select-");
// arr[1] = new Array("Ph.D/M.Phil.");
// arr[2] = new Array("MCA");
// arr[3] = new Array("Msc(IT)");
// arr[4] = new Array("MBA");
// arr[5] = new Array("MSW");
// arr[6] = new Array("ASSAME","EDUCTION","ENGLISH","POLITICAL SCIENCE","SOCILOGY","JOURNALISM AND MASSCOMMUNICATION");
// arr[7] = new Array("PGDMC","PGDHRM","PGDBI","PGDBJ","PGDBM","PGDCA");
// arr[8] = new Array("BCA"," BBA"," B.com"," BA");
// arr[9] = new Array("Florida","New York","Maryland");
// arr[10] = new Array("DIMC","DTM","DCWE","DCHN","DLIS","DSL");
// arr[11] = new Array("ASSAME","EDUCTION","ENGLISH","POLITICAL SCIENCE","SOCIOLOGY","ECONOMICS","PHILOSOPHY");

<?php
include_once("utility_config.php");
$departments = all_departments();
$courses = all_courses();

if($courses)
{
  while($row = $courses->fetch())
  { ?>
    if(arr.hasOwnProperty('<?=$row[4];?>'))
    {
      arr['<?=$row[4];?>']['<?=$row[0];?>'] = '<?=$row[1];?>';
    }
    else
    {
      var h = new Object();
      h['<?=$row[0];?>'] = '<?=$row[1];?>';
      arr['<?=$row[4];?>'] = h;
    }
<?php }
}

?>
function change(Dtype){
  var comboValue = Dtype.value;
  document.forms["coursesUploadd"].elements["SC"].options.length=0;
  for (var k in arr[comboValue]){
    var option = document.createElement("option");
    option.setAttribute('value',k);
    option.innerHTML = arr[comboValue][k];
    document.forms["coursesUploadd"].elements["SC"].appendChild(option);
  }
}
</script>
</head>

<body bgcolor="#000035">
<table width="100%"  cellpadding="10" cellspacing="0" border="0">
  <tr>

<!-- ============ HEADER SECTION ============== -->
<td height="100" bgcolor="#000035" style="height: 20px;"><table width="100%" border="0">
  <tr>
      <th width="19%" scope="col"><a href="1home.html"><img src="img/button_home.png" width="127" height="70" alt="home"></a></th>
      <th width="26%" height="76" scope="col">Department 
        <select name="Dtype" onChange="change(this);">
          <option value="0" selected>-Select-</option>
          <?php
          if($departments)
          {
            while($row = $departments->fetch())
            { ?>
              <option value='<?=$row[0];?>' ><?=$row[1];?></option>
            <?php
            }
          }
          ?>
          </select></th>
      <th width="20%" scope="col"><p> Courses
        <select name="SC">
            <option value="0">-Select-</option>
          </select>
    </p></th>
      <th width="17%" scope="col"><a href="1home.html" target="myframe"><img src="img/home-imgs/submit.png" width="127" height="70" alt="submit"></a></th>




<table width="100%" border="1" bgcolor="#000000" align="center">
  <tr>
      <td width="100%" height="600px" align="center"><iframe  width="100%" height="50%" src="https://www.youtube.com/embed/ga5la55t4-M?autoplay=1" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen name="myframe"></iframe>
      
      
      </td>
    </tr>
</table>




    
</table>
 </td>
</tr></table>
</body>

<html>

