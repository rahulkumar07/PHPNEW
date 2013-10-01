<?php 
echo "<html>";
echo "<head>";
require 'settings.php';

echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo " $header";
require 'fac_header.php';

$prog_name=$_POST['prog_name'];
$lab_name=$_POST['prog_list'];
$rollno=$_POST['rollno'];
$lang=$_POST['lang'];

if(empty($rollno)&&empty($lang))  //shows results if both rollnumber and language is left
	{
	if(!empty($prog_name)&&empty($lang))
		{
		$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
		mysql_select_db("$db_name") or die('Could not select database');
		$id=$_POST['fac_id'];
		$quer=mysql_query("insert into prog_lists(prog_name,prog_sub,fac_id) values('$prog_name','$lab_name','$id')"); 
		echo "<h3>insertion Successful</h3>";

		}
	else 
		{
		echo "<h3>You haven't enter the prog_name for insertion</h3>";
		}
	}

if(empty($rollno)&& empty($prog_name)&& !empty ($lang) )
{	
	$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
	mysql_select_db("$db_name") or die('Could not select database');
	$quer=mysql_query("select *from $lang ");
	while($row = mysql_fetch_array($quer)){
	echo "<textarea name=prog_name cols=11 rows=1  >$row[0] </textarea>". " - " . "<textarea cols=20 rows=1 >$row[1] </textarea> " ." - "." <textarea cols=30 		rows=1 > $row[2] </textarea>" . " - " . "<textarea cols=20 rows=1 >$row[3] </textarea>" . " - " . "<textarea cols=20 rows=1 >$row[4] </textarea>". " - " . 		"<textarea cols=15 rows=1 >$row[5] </textarea>";
	echo "<br />";				}
}
if(empty($rollno)&& !empty($prog_name)&& !empty ($lang) )
{
	 $con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
	mysql_select_db("$db_name") or die('Could not select database');
	$quer=mysql_query("select *from $lang where prg_name LIKE '$prog_name%'");
	while($row = mysql_fetch_array($quer)){
	echo "<textarea name=prog_name cols=11 rows=1  >$row[0] </textarea>". " - " . "<textarea cols=20 rows=1 >$row[1] </textarea> " ." - "." <textarea cols=30 		rows=1 > $row[2] </textarea>" . " - " . "<textarea cols=20 rows=1 >$row[3] </textarea>" . " - " . "<textarea cols=20 rows=1 >$row[4] </textarea>". " - " . 		"<textarea cols=15 rows=1 >$row[5] </textarea>";
	echo "<br />";				}
}

if(!empty($rollno)&& empty($prog_name)&& !empty ($lang) )
{
	$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
	mysql_select_db("$db_name") or die('Could not select database');
	$quer=mysql_query("select *from $lang where rollno LIKE '%$rollno%'");
	while($row = mysql_fetch_array($quer)){
	echo "<textarea name=prog_name cols=11 rows=1  >$row[0] </textarea>". " - " . "<textarea cols=20 rows=1 >$row[1] </textarea> " ." - "." <textarea cols=30 		rows=1 > $row[2] </textarea>" . " - " . "<textarea cols=20 rows=1 >$row[3] </textarea>" . " - " . "<textarea cols=20 rows=1 >$row[4] </textarea>". " - " . 		"<textarea cols=15 rows=1 >$row[5] </textarea>";
	echo "<br />";				}
}
	
if(!empty($rollno)&& !empty($prog_name)&& !empty ($lang) )
{
	$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
	mysql_select_db("$db_name") or die('Could not select database');
	$quer=mysql_query("select *from $lang where prg_name='$prog_name'and rollno='$rollno'");
	while($row = mysql_fetch_array($quer)){
	echo "<textarea name=prog_name cols=11 rows=1  >$row[0] </textarea>". " - " . "<textarea cols=20 rows=1 >$row[1] </textarea> " ." - "." <textarea cols=30 		rows=1 > $row[2] </textarea>" . " - " . "<textarea cols=20 rows=1 >$row[3] </textarea>" . " - " . "<textarea cols=20 rows=1 >$row[4] </textarea>". " - " . 		"<textarea cols=15 rows=1 >$row[5] </textarea>";
	echo "<br />";				}
}


require 'faculty_footer.php';
?>
