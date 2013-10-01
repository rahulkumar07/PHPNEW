<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";
require 'header.php';
$source=$_POST['source1'];
$out=$_POST['outnerr'];

echo "<form action=java_final.php method= post >";

echo "Enter your rollno";
echo "<input type=text name=rollno maxlength=10><br>";
echo "Enter your Password";
echo "<input type=password name=pass><br>";
echo "Enter your Program name";
echo "<input type=text name=prg_name><br>";
echo "Your Source code is <br>";
echo "<textarea name=source cols=60 rows=20 readonly=readonly>$source </textarea>";
echo "<br>Your Source code's compiled result is <br>";
echo "<textarea name=outnerr cols=60 rows=2 readonly=readonly >$out  </textarea><br>";
echo "<input type=submit value='Save to DB'>";

echo "</form>";

require 'footer.php';

echo "</body>";
echo "</html>";

?>		
