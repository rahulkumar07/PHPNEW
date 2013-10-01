<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";
require 'header.php';
$sug=htmlentities($_POST['source'],ENT_QUOTES);;
$bug_sug=$_POST['bug_sug'];
$passwd=$_POST['pass'];
$roll=$_POST['rollno'];
$con = mysql_connect($host, $db_user, $db_pass)or die('Could not connect: ' . mysql_error());
mysql_select_db("$db_name") or die('Could not select database');
$quer=mysql_query("select passwd from students where rollno='$roll'");  
$row = mysql_fetch_row($quer);
$pass1=$row[0];
if(!empty($sug)){
if(($passwd==$pass1)){
mysql_query("INSERT INTO bug_sug(rollno,report,bug_sug,ip) values('$roll','$sug','$bug_sug','$ip')")or die(mysql_error()); ;
mysql_close($con);

echo "Reported Successfully";
		    }
else
echo "Rollno or password doesn't matches";
}
else 
echo "Please enter something in report";

require 'footer.php';
echo "</body";
echo "</html>";
?>
