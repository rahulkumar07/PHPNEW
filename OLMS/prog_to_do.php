<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";

$prog=$_POST['prog_list'];
echo "<h3>Showing to do programs for $prog</h3>";


$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
mysql_select_db("$db_name") or die('Could not select database');
$query=mysql_query("select prog_lists.prog_name,prog_lists.date_time ,faculty.name  from prog_lists,faculty where prog_lists.fac_id=faculty.id and prog_lists.prog_sub='$prog' order by date_time desc") or die(mysql_error());; 



// Print out the contents of each row into a table 
while($row = mysql_fetch_array($query)){
	echo "<textarea name=prog_name cols=60 rows=1  >$row[0] </textarea>". " - " . "<textarea cols=20 rows=1 >$row[1] </textarea> " ." - "." <textarea cols=30 rows=1 >Given By  $row[2] </textarea>";
	echo "<br />";
}


require 'footer.php';

echo "</body>";
echo "</html>";
?>
