<html>
    <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Print your hallticket here.</title>
        
		<style>
		body{color:#FFFFFF;}
		</style>
		<script type="text/javascript" src="./jquery-1.8.2.js"></script>
    <script type="text/javascript" src="./mfs100-9.0.2.6.js"></script>
    <script type="text/javascript" src="./validate.js"></script>
    </head>
    <body bgcolor="#000035">
    <h1 align="center"> PrintHallTicket</h1>
    <table width="100%" border="1"  align="center" bordercolor="#000035">
  <tr bgcolor="#000070">
    <th scope="col">
     <form method='post' id="print_ht_form" name="print_ht_form" action="./print_hallticket.php">
            Student Email :
              <input type="text" name="emailid" id="emailid" size="30"><br>
            Scan your finger:<img name="imgFinger" id="imgFinger" width="145px" height="188px" alt="Finger image." />
            <input type="hidden" name="fingerbase64" id="fingerbase64"
             size="30" value="">
            <br />
            <button class="btn btn-primary" onClick="return CaptureForPrintHT();"><strong>scan</strong></button>
            <br /><br />
            <input type="button" value="Submit Form" onClick="return(validatePrintHT());"/>
      </form>  
    </th>
  </tr>
  <tr>
    <th scope="col">&nbsp;</th>
  </tr>
  </table>
  </body>
</html>