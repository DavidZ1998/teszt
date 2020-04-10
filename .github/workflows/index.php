<!DOCTYPE html>
<?php
    session_start();
    include("adatok.php");
    include("fuggvenytar.php");
    $conn = dbconnect($dbhost, $dbname, $dbuser, $dbpass);
?>
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $pagename; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/kave.css">
    </head>
    <body>
        <div id="container">
            <div id="menubar">
                <ul class="menu">
                    <li><a href="index.php?pg=hirek">Hírek</a></li>
                    <li><a href="index.php?pg=kavek">Kávék</a></li>
                    <li><a href="index.php?pg=gepek">Kávégépek</a></li>
                    <li><a href="index.php?pg=rolunk">Rólunk</a></li>
                    <li><a href="index.php?pg=kapcsolat">Kapcsolat</a></li>
                </ul>
            </div>
            <div id="header"><?php echo $pagename; ?></div>
            <div id="content">
                <div id="box1">
                    <?php include("betolto.php"); ?>
                </div>
                <div id="box2">Box 2</div>
                <div id="box3">
                    <?php include("belepes.php"); ?>
                </div>
            </div>
            <div id="footer"><?php echo $company.' - '.$author; ?></div>
        </div>
    </body>
</html>