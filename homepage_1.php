<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<style type="text/css">
img {
    border-radius: 90px;
	
}

.flex-container1{
	width: 90%;
	min-height: 200px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#FFFFFF;
	background-color: #000035;

}


.flex-container{
	width: 90%;
	min-height: 400px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#FFFFFF;
	background-color: #000035;

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
    border: none;
    color: white;
    padding: 5px 80px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
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
	color:#FFFFFF;
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
	height: 200px;
	border: 0px solid;
	background-color:000035;
} 

div.absolute {
	position: absolute;
	top: 2px;
	left: 0px;
	width: 100%;
	height: 21px;
	border: 0px solid;
	background-color:  #000034;
}

div.absolute1 {
	position: absolute;
	top: 36px;
	right: 3px;
	width: 99%;
	height: 151px;
	border: 0px solid;
	background-color:  #000034;
}


div.absolute2 {
	position: absolute;
	top: -31px;
	right: 0px;
	width: 175px;
	height: 51px;
	border: 0px solid;
	background-color:  #000034;
}
div.absolute3 {
	position: absolute;
	top: 303px;
	right: 4px;
	width: 290px;
	height: 188px;
	border: 0px solid;
	font-size:12px;
	background-color:  #00468C;
}





nav {
    float: left;
    max-width: 100px;
    margin: 0;
    padding: 1em;
	color:#FFFFFF;
	background-color:#000035;
}

nav ul {
    list-style-type: none;
    padding: 0;
    
}
   
nav ul a {
    text-decoration: none;
}

article {
    margin-left: 170px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
    background-color:#FFFFFF;

}

iframe
{
	color:#FFFFFF;
	border:dotted;
}



    
    </style>



</head>

<body>

<?php
include_once("utility_config.php");

if(isset($_POST['uname']) && isset($_POST['password']))
{
    $uname=$_POST['uname'];
	$password=$_POST['password'];
	connect_mysql($uname, $password);
}
else
{
	header("Location: index.php");
	die();
}
?>
<div class="flex-container1">

<div class="relative">
<div class="absolute">
  <div align="center"><strong>WELCOME TO KRISHNA KANTA HANDIQUI OPEN UNIVERSITY</strong> </div>
</div>

<div class="absolute1">
<div align="center"><img src="kksu.jpeg" width="150" height="150" />
  <div class="absolute2">
    <div align="right"><strong><a href="./logout.php" style="color:white">LogOut</a></strong></div>
  </div>
</div>
</div>


</div>

</div>
<!-- <section>hi</section> -->

<div class="flex-container">
<nav>
  <ul>
    <li><a href="http://www.kkhsou.in/web/" target="myframe">
    <button class="button"><strong>Upload Details</strong></button></a></li>
    
    <li><a href="http://www.kkhsou.in/web/student_corner/all_news.html" target="myframe">
    <button class="button"><strong>Print Hticket</strong></button></a></li>
    
    <li><a href="http://www.kkhsou.in/web/student_corner/assignments.php" target="myframe">
    <button class="button"><strong>Search Details</strong></button></a></li>
    
    
    <li><a href="#"><button class="button"><strong>link Details</strong></button></a></li>
    <li><a href="#"><button class="button"><strong>link2 Details</strong></button></a></li>
  </ul>
</nav>


<article>

      <iframe src = "./StudentRegistration.html" width = "775" height = "500" name="myframe">
         Sorry your browser does not support inline frames.
      </iframe>
      
</article>







1
</div>

<footer>copy rights at the rights 2018</footer>



</body>
</html>
