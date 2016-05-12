<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Rena's Music Database!</title>
<link type = "text/css" rel="stylesheet" href="style.css"/>
</head>

<body>
<div>
<h1>Search Database</h1>
<?php 
require("nav.php");
?>

<div id = "body">
<div id="pic"><p><img src="birdsing.jpg" alt="singingbird" height="180" width="150"/></p></div>
<?php 
require("searchfunct.php");
?>
</div>
</div>



</body>
</html>