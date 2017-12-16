<html>
    <head>
        <title>Print your hallticket here.</title>
        <script type="text/javascript" src="jquery-1.8.2.js"></script>
        <script type="text/javascript" src="mfs100-9.0.2.6.js"></script>
        <script type="text/javascript" src="validate.js"></script>
    </head>
    <body>
        <form method='post' id="print_ht_form" name="print_ht_form" action="./print_hallticket.php">
            <input type="text" name="emailid" id="emailid" size="30"><br>
            <img name="imgFinger" id="imgFinger" width="145px" height="188px" alt="Finger image." />
            <input type="hidden" name="fingerbase64" id="fingerbase64" size="30">
            <br />
            <button class="btn btn-primary" onclick="return CaptureForPrintHT();"><strong>scan</strong></button>
            <br /><br />
            <input type="button" value="Submit Form" onclick="return(validatePrintHT());"/>
        </form>
    </body>
</html>