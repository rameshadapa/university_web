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
	
	color:#FFFFFF;}

</style>
<?php
include_once("utility_config.php");
$departments = all_departments();
if(isset($_POST['dept']))
{
  $dept_name = $_POST['dept'];
  $dept_add_status = '';
  if(add_department($dept_name) == true)
  {
    $dept_add_status = 'Department add successfully.';
  }
  else
  {
    $dept_add_status = 'Error in adding department.';
  }
}
?>
<script language="javascript">
var arr = new Array();
arr[0] = new Array("-select-");
arr[1] = new Array("Ph.D/M.Phil.");
arr[2] = new Array("MCA");
arr[3] = new Array("Msc(IT)");
arr[4] = new Array("MBA");

arr[5] = new Array("MSW");
arr[6] = new Array("ASSAME","EDUCTION","ENGLISH","POLITICAL SCIENCE","SOCILOGY","JOURNALISM AND MASSCOMMUNICATION");
arr[7] = new Array("PGDMC","PGDHRM","PGDBI","PGDBJ","PGDBM","PGDCA");
arr[8] = new Array("BCA"," BBA"," B.com"," BA");
arr[9] = new Array("Florida","New York","Maryland");
arr[10] = new Array("DIMC","DTM","DCWE","DCHN","DLIS","DSL");

arr[11] = new Array("ASSAME","EDUCTION","ENGLISH","POLITICAL SCIENCE","SOCIOLOGY","ECONOMICS","PHILOSOPHY");




function change(Dtype){
  var comboValue = Dtype.value;
  document.forms["form"].elements["SC"].options.length=0;
  for (var i=0;i<arr[comboValue].length;i++){
    var option = document.createElement("option");
    option.setAttribute('value',i+1);
    option.innerHTML = arr[comboValue][i];
    document.forms["form"].elements["SC"].appendChild(option);
  }
}
</script>
<script src="js/CoursesUploadd_validate.js"></script>
</head>
<body bgcolor="#000035">
          
          
      <form action="#" name="coursesUploadd" onSubmit="return(validate());">
      
      
      <table width="20%" border="1" bgcolor="#000060"  align="center">
  <tr>
    <th width="48%" scope="col"></th>
    <th width="48%" scope="col"><h1>CourseDetails</h1></th>
   
  </tr>
  <tr>
    <td>Department	: </td>
    <td width="52%"><select name="Dtype" onChange="change(this);">
	    <option value="0">select..</option>
	    <option value="Ph.D&M.Phil">Ph.D&M.Phil</option>
	    <option value="Master'sDegree">Master'sDegree</option>
     
     <option value="PG Diploma">PG Diploma</option>
	    <option value="Bachelors Degree">Bachelors Degree</option>
     
     <option value="Diploma">Diploma</option>
	    <option value="D.El.Ed.">D.El.Ed.</option>
     
     <option value="Certificate">Certificate</option>
	    <option value="ICT Enabled Programmes">ICT Enabled Programmes</option>
     
     
     
      </select></td>
  </tr>
  <tr>
    <td>SelectCourses	</td>
    <td><select name="SC">
    
    <option value="0">select</option>
    <option value="c1">c1</option>
      <option value="c2">c2</option>
    </select></td>
  </tr>
  <tr>
    <td>Select Year </td>
    <td><select name="year">
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
    <td><textarea name="desc" id="desc2" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>UploadImages</td>
    <td><input type="file" name="img" id="img2"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><button class="button">submit</button></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

       </form>
          
          
          
          

</body>
</html>