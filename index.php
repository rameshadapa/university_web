<!DOCTYPE html>
<html>
<head>
<style>
a:link, a:visited {
    background-color: #000070;
    color: white;
    padding: 14px 75px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	border-radius:15px;
    
}
a:hover, a:active {
    background-color: #C9C9F8;
}
</style>
<style>
* {
    box-sizing: border-box;
}

iframe{
	alignment-adjust:central;
	background-color:#fff}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 33.33%;
    padding: 10px;
    height: 140px;
	color:#FFFFFF; /* Should be removed. Only for demonstration */
}



article {
    background-color:#000035;
   width:98%;

   
}


.flex-container{
	width: 99%;
	min-height: 100px;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */		
	display: flex; /* Standard syntax */
    color:#FFFFFF;

}




/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

section{
	width:100%;
	float:left;
	background-color:#555555;
}


.content {
    max-width:99%;
    margin: auto;
    background: #555555;
    padding: 5px;
	max-height:100%;
}
.flex-container1{
	max-width: 99%;
	min-height: 50%;
	margin: 0 auto;
	display: -webkit-flex; /* Safari */
	display: flex; /* Standard syntax */
	color:#FFFFFF;
	background-color: #000035;
	font-size: 14px;
}






.content .row .column h2 {
	font-size: 12px;
}
img
{
	border-radius:90%;
}




.video-container {
	position:relative;
	padding-bottom:50.25%;
	padding-top:2px;
	height:80%;
	width:100%;
	overflow:hidden;
}

.video-container iframe, .video-container object, .video-container embed {
	position:absolute;
	top:5px;
	left:2px;
	width:100%;
	height:700px;
	float:left;
	background-color:#FFFFFF;
}

select{
	width:150px;
}















</style>

</head>
<body bgcolor="#FFFFFF">
<?php
include_once('utility_config.php');
$user = get_user();
if(isset($user))
{
    exit(header("Location: ./homepage.php"));
}
?>

<div class="content">
  <div class="row">
  <div class="column" style="background-color:#000035;">
    <table width="40%" height="122" border="0">
      <tr>
        <th height="116" scope="col"><img src="img/DD1.png" width="119" height="111" alt="kkhsou"></th>
      </tr>
    </table>
    <h2>&nbsp;</h2>
</div>
  <div class="column" style="background-color:#000035; font-size: 10px;">
    <h2>CONTACTUS: <strong>Krishna kanta Handiqi Open University</strong><br>
      Headquarters: Patgaon, Rani. Guwahati- 781017. Assam. India<br>
      City Office: Housefed Complex. Last Gate, Dispur, Guwahati 781006, Assam, India<br>
      Tel.: +91 - 0361-2235971/2234964, Fax: 0361 -2235398<br>
      Email: info@kkhsou.in<br>
      Website: www.kkhsou.com</h2>
<p>&nbsp;</p>
  </div>
  <div class="column" style="background-color:#000035;">
<marquee behavior="scroll" direction="up" onmouseover="this.setAttribute('scrollamount', 1, 0);" onmouseout="this.setAttribute('scrollamount', 3, 0);">
<p>WELCOME TO KRISHNA KANTA--</p>
<p>		------------------------------------------</p>
<p>HANDIQUI STATE OPEN UNIVERSITY</p>
</marquee>
  </div>
</div>

<section>

<a href="Elearningvideos.html" target="_self"><strong>E-learningVideos</strong></a>
<a href="CouseDetails.html" target="_self"><strong>CourseDetails</strong></a>
<a href="./printhallticketForm.php" target="_self"><strong>PrintHallticket</strong> </a>
<a href="#" target="_self"><strong>OfflineVideos</strong> </a>
<a href="./userlogin.php" target="_self"><strong>Login</strong></a>

</section>






<div class="flex-container">
 
<article>

 <div class="video-container">
   
   <iframe src="https://www.youtube.com/embed/o-BBc2yayV8?autoplay=1" name="myframe">
         Sorry your browser does not support inline frames.
    </iframe>
  
 </div>
 </article>
</div>


</div>





</body>
</html>
