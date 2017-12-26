<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
</head>
<body>
<?php
    if(isset($_POST['emailid']) && isset($_POST['fingerbase64']))
    {
        $emailid = $_POST['emailid'];
        $fingerbase = $_POST['fingerbase64'];
        echo $emailid;
        echo "<br />";
        echo $fingerbase;
    }
?>
<h2>Your hallticket should display here.</h2>
</body>