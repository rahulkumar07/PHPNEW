<?php
$ip=$_SERVER['REMOTE_ADDR'];
$con = mysql_connect('localhost', 'root', 'asdfgh') or die('Could not connect: ' . mysql_error());
mysql_select_db("OCCWCC") or die('Could not select database');
$outnerr=htmlentities($outnerr,ENT_QUOTES);
?>
