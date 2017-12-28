<html>
<head>
<style type="text/css">
button {
    background-color: #00468C;
    border: none;
    color: white;
    padding: 15px 80px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}
.flex-container{
	width: 90%;
	min-height: 580px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#FFFFFF;
	background-color: #000035;

}
div.relative {
	position: relative;
	width: 100%;
	height: 200px;
	border: 0px solid;
	background-color:000035;
} 
div.absolute {
	position: fixed;
	top: 34px;
	left: 294px;
	width: 444px;
	height: 21px;
	border: 0px solid;
	background-color:  #000034;
}
.center {
    margin: auto;
    width: 50%;
    border: 3px solid green;
    padding: 10px;
}
table{
	color:#FFFFFF;
}

</style>
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
<script type="text/javascript" src="js/CoursesUploadd_validate.js"></script>
</head>
<body bgcolor="#000035">
  <form method="post" id="coursesUploadd" name="coursesUploadd" action="./upload_courses.php" enctype="multipart/form-data">
  <table width="20%" border="1" bgcolor="#000060"  align="center">
  <tr>
    <th width="48%" scope="col"></th>
    <th width="48%" scope="col"><h1>CourseDetails</h1></th>
  </tr>
  <tr>
    <td>Department	: </td>
    <td width="52%"><select name="Dtype" onChange="change(this);">
    <option value="0" selected>select..</option>
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
    </select></td>
  </tr>
  <tr>
    <td>SelectCourses	</td>
    <td><select name="SC" id="SC">
    <option value="0">select</option>
    </select></td>
  </tr>
  <tr>
    <td>Select Year </td>
    <td><select name="year" id="year">
      <option value="0" selected>-Select-</option>
      <option value="1">1year</option>
      <option value="1-1sem">1-1sem</option>
      <option value="1-2sem">1-2sem</option>
      <option value="2">2year</option>
      <option value="2-1sem">2-1sem</option>
      <option value="2-2sem">2-2sem</option>
      <option value="3">3rd year</option>
      <option value="3-1sem">3-1sem</option>
      <option value="3-2sem">3-2sem</option>
    </select></td>
  </tr>
  <tr>
    <td>CourseDetails:</td>
    <td><textarea name="desc" id="desc" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>UploadImages</td>
    <td><input type="file" name="img" id="img"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><button class="button" onclick="return(validate());">submit</button></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>