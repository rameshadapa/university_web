<html>

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
	position: absolute;
	top: 34px;
	left: 294px;
	width: 444px;
	height: 21px;
	border: 0px solid;
	background-color:  #000034;
}






</style>
<script language="javascript">
var arr = new Array();
arr[0] = new Array("-select-");
arr[1] = new Array("Ph.D");
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
function change(combo1){
var comboValue = combo1.value;
document.forms["form"].elements["combo2"].options.length=0;
for (var i=0;i<arr[comboValue].length;i++){
var option = document.createElement("option");
option.setAttribute('value',i+1);
option.innerHTML = arr[comboValue][i];
document.forms["form"].elements["combo2"].appendChild(option);
}
}
</script>
<body>
<div class="flex-container">

<div class="relative">

          
 <div class="absolute">         
          
          
      <form name="form" method="post">
            <p>Department	: &gt;
              <select name="combo1" onChange="change(this);">
                <option value="0">-Select-</option>
                <option value="1">Ph.D</option>
                <option value="2">MCA</option>
                <option value="3">MSc(IT)</option>
                <option value="4">MBA</option>
                <option value="5">MSW</option>
                <option value="6">M.A</option>
                <option value="7">PG.Diploma</option>
                <option value="8">BachelorDegree</option>
                <option value="9">Diploma</option>
                <option value="10">D.EI.Ed</option>
                <option value="11">B.A</option>
                </option>
              </select>
              <br>
              SelectCourses	:
              <select name="combo2">
              </select>
              <br>
              CourseDetails:
              <label for="desc"></label>
              <textarea name="desc" id="desc" cols="45" rows="5"></textarea>
            </p>
            <p>UploadImages
              <label for="img"></label>
              <input type="file" name="file" id="img">
            </p>
            <p><button class="button">submit</button></p>
  </form>
          
          
          
          
    </div>
          
  </div>
</div>
</div>
</body>
</html>