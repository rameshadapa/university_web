<!DOCTYPE html>
<html lang="en">
<head>
<title>Creating Two Equal Height Columns Using CSS</title>
<style type="text/css">
img {
    border-radius: 90px;
	
}

.flex-container1{
	width: 90%;
	min-height: 500px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#FFFFFF;
	background-color: #000035;

}


.flex-container{
	width: 90%;
	min-height: 200px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#FFFFFF;

}
.flex-container .column{
	padding: 10px;
	background: #000035;
	-webkit-flex: 1; /* Safari */
	-ms-flex: 1; /* IE 10 */
	flex: 1; /* Standard syntax */
}
.flex-container .column.bg-alt{
	background: #000035;
}
.flex-container .column.bg-alt1{
	background: #000035;
	
}


.flex-container .column.bg-alt11{
	background: #000035;
}
.flex-container .column.bg-alt12{
	background: #FF0;
	
}

button {
    background-color: #00468C;
    border-radius: 5px;
    border: none;
    color: white;
    padding: 15px 80px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

button:hover {
    background-color: #454545;
}


button1 {
    background-color: #00468C;
    border: none;
    color: white;
    padding: 5px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 1px;
    cursor: pointer;
}



section
{
    width: 90%;
	min-height: 40px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#00000;
	background-color:#F00;
	}




footer
{
    width: 90%;
	min-height: 20px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color: #FFF;
	background-color: #000075 ;
	}


content
	{
width: 90%;
	min-height: 200px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#00000;
	background-color:#000035;
	}
	
div.relative {
    position: relative;
    width: 100%;
    height: 500px;
    border: 0px solid ;
} 

div.absolute_videos {
	position: absolute;
	top: 78px;
	left: 5px;
	width: 530px;
	height: 314px;
	border: 0px solid;
	background-color:  #00468C;
}

div.absolute1 {
	position: absolute;
	top: 8px;
	right: 3px;
	width: 290px;
	height: 128px;
	border: 5px solid;
	border-color: #00468C;
	background-color:  #00468C;
}


div.absolute2 {
	position: absolute;
	top: 144px;
	right: 3px;
	width: 290px;
	height: 137px;
	border: 5px solid;
	border-color:#00468C;
	background-color:  #00468C;
}
div.absolute3 {
	position: absolute;
	top: 291px;
	right: 3px;
	width: 290px;
	height: 202px;
	border: 5px solid;
	border-color:#00468C;
	font-size:8px;
	background-color:  #00468C;
}
</style>
</head>
<body>
<?php
include_once('utility_config.php');
$user = get_user();
if(isset($user))
{
    exit(header("Location: ./homepage.php"));
}
?>
<div class="flex-container">
  <div class="column">
  <form name="form1" method="post" action="homepage.php">
  <strong>Username:</strong>
    <input type="text" name="uname" id="uname"><br>
            <strong>Password: </strong>
    <input type="password" name="password" id="password"><br>
    <select name="utype" id="utype">
      <!-- <option value="-1">select</option> -->
         <option value="1" selected>Co-ordinator</option>
      </select><br>
      <?php
      if(isset($_GET['error']))
      { 
          echo "<label style='color:red'>" . $_GET['error'] . "</label><br>";
      }
      ?>
        <input type="submit" name="submit" id="submit" value="Login">
      </form>
  </div>
        <div class="column bg-alt"><div align="center"><img src="kksu.jpeg" width="180" height="180"></div></div>
        <div class="column bg-alt1"><button class="button"><a href="./printhallticketForm.php" style="color:white;"><strong>Print Hallticket</strong></a></button>
</div>
</div>
  <section><marquee> Welcome to kkhou </marquee> </section>
  
  
  <div class="flex-container1">
  <div class="relative">
    <p><strong>Select Cource</strong>
      <select name="cource" size="1" id="cource">
        <option value="-1">select</option>
        <option value="bca">BCA</option>
        <option value="diploma">Diploma</option>
      </select>
      <label for="submit">
        <input type="submit" name="submit" id="submit" value="Submit">
      </label>
    </p>
<div class="absolute_videos">


<iframe width="530" height="315" src="https://www.youtube.com/embed/o-BBc2yayV8?autoplay=1" frameborder="0" allowfullscreen></iframe>

</div>








<div class="absolute1">


<marquee behavior="scroll" direction="up" onmouseover="this.setAttribute('scrollamount', 1, 0);" onmouseout="this.setAttribute('scrollamount', 3, 0);">

WELCOME TO KRISHNA KANTA HANDIQUI STATE OPEN UNIVERSITY</marquee>

</div>


<div class="absolute2">
  <p><strong>Co-ordinatorDetails</strong>
    <select name="select" id="select">
      <option value="-1">select</option>
      <option value="branch1">Branch1</option>
      <option value="branch2">Branch2</option>
      <option value="branch3">Branch3</option>
    </select>
    <input type="submit" name="submit2" id="submit2" value="Submit">
  </p>
<p>&nbsp; </p>
</div>


<div class="absolute3"><strong></strong><h2 align="left"><strong>ContactUs</strong></h2>
  <h2 align="left"><strong>KRISHNA KANTA HANDIQUI STATE OPEN UNIVERSITY</strong><br>
    Headquarters: Patgaon, Rani. Guwahati- 781017. Assam. India<br>
    City Office: Housefed Complex. Last Gate, Dispur, Guwahati 781006, Assam, India<br>
    Tel.: +91 - 0361-2235971/2234964, Fax: 0361 -2235398<br>
    Email: <a href="mailto:info@kkhsou.in" style="color:white">info@kkhsou.in</a><br>
    Website: <a href="www.kkhsou.in" style="color:white">www.kkhsou.in</a></h2>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</div>
<footer>Copy rights at right of krishna kanta Open University</footer>  
  
</body>
</html>                            