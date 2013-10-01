<?php 
echo "<html>";
echo "<head>";
require 'settings.php';
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo " $header";
require 'fac_header.php';

$num=$_POST['num'];
$lang=$_POST['lang'];
$branch=$_POST['branch'];
$rollno=$_POST['rollno'];
$passyear=$_POST['passyear'];

if(!empty($lang))
{	
	$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
	mysql_select_db("$db_name") or die('Could not select database');
	$quer=mysql_query("select *from $lang  order by date_time desc") or die('MySql syntax error =>' . mysql_error());;
	mysql_close($con);
	while($row = mysql_fetch_array($quer)){
	echo "<textarea name=prog_name cols=60 rows=1  >$row[0] </textarea>". " - " . "<textarea cols=30 rows=1 >$row[1] </textarea> " ." - "." <textarea cols=20 		rows=1 >$row[2] </textarea>" . "<textarea name=prog_name cols=15 rows=1  >$row[3] </textarea>";
	echo "<br />";				}
}

if(empty($lang)&&!empty($num))
{	
if($num=='Suggestion')
echo "<br><strong> Showing Suggestions for the project </strong><br>";
else
echo "<br> <strong>Showing Bugs of the project<strong><br>";

	$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
	mysql_select_db("$db_name") or die('Could not select database');
	$quer=mysql_query("select rollno,report,date_time,ip from bug_sug  where bug_sug='$num' order by date_time desc") or die('MySql syntax error =>' . mysql_error());;
	mysql_close($con);
	while($row = mysql_fetch_array($quer)){
	echo "<textarea  cols=11 rows=1  >$row[0] </textarea>". " - " . "<textarea cols=30 rows=1 >$row[1] </textarea> " ." - "." <textarea cols=20 		rows=1 >$row[2] </textarea>" . "<textarea name=prog_name cols=15 rows=1  >$row[3] </textarea>";
	echo "<br />";				}
}


if(!empty($rollno)&& !empty($branch))
{	
echo "<br><strong> Showing Students details </strong><br>";


	$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
	mysql_select_db("$db_name") or die('Could not select database');
	$quer=mysql_query("select rollno,name,branch,paasyear,mobno,emailid from students  where rollno='$rollno' ") or die('MySql syntax error =>' . mysql_error());;
	mysql_close($con);
echo "<strong><textarea  cols=11 rows=1  >Rollno </textarea>". " - " . "<textarea cols=30 rows=1 >Name of student </textarea> " ." - "." <textarea cols=6 		rows=1 >Branch </textarea>" . "<textarea  cols=4 rows=1  >Passyear </textarea>" . "<textarea  cols=10 rows=1  >Mobile Numb </textarea>" . "<textarea  cols=20 rows=1  >EmailId </textarea></strong><br>";
	while($row = mysql_fetch_array($quer)){
	echo "<textarea  cols=11 rows=1  >$row[0] </textarea>". " - " . "<textarea cols=30 rows=1 >$row[1] </textarea> " ." - "." <textarea cols=6		rows=1 >$row[2] </textarea>" . "<textarea  cols=4 rows=1  >$row[3] </textarea>" . "<textarea  cols=10 rows=1  >$row[4] </textarea>" . "<textarea  cols=20 rows=1  >$row[5] </textarea>";
	echo "<br />";				}
}

if(empty($rollno)&& !empty($branch))
{	
echo "<br><strong> Showing Students details </strong><br>";


	$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
	mysql_select_db("$db_name") or die('Could not select database');
	$quer=mysql_query("select rollno,name,branch,paasyear,mobno,emailid from students  where branch='$branch' and paasyear='$passyear' ") or die('MySql syntax error =>' . mysql_error());;
	mysql_close($con);
echo "<strong><textarea  cols=11 rows=1  >Rollno </textarea>". " - " . "<textarea cols=30 rows=1 >Name of student </textarea> " ." - "." <textarea cols=6 		rows=1 >Branch </textarea>" . "<textarea  cols=4 rows=1  >Passyear </textarea>" . "<textarea  cols=10 rows=1  >Mobile Numb </textarea>" . "<textarea  cols=20 rows=1  >EmailId </textarea></strong><br>";
	while($row = mysql_fetch_array($quer)){
	echo "<textarea  cols=11 rows=1  >$row[0] </textarea>". " - " . "<textarea cols=30 rows=1 >$row[1] </textarea> " ." - "." <textarea cols=6 		rows=1 >$row[2] </textarea>" . "<textarea  cols=4 rows=1  >$row[3] </textarea>" . "<textarea  cols=10 rows=1  >$row[4] </textarea>" . "<textarea  cols=30 rows=1  >$row[5] </textarea>";
	echo "<br />";				}
}


require 'faculty_footer.php';
?>




