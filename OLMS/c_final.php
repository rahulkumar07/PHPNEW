<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "<h1> $header</h1>";
require 'header.php';
$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
mysql_select_db("$db_name") or die('Could not select database');
//echo 'Connected successfully';   This is to check that our code can reach to the database or not
$passwd=$_POST['pass'];
$roll=$_POST['rollno'];
$outnerr=htmlentities($_POST['outnerr'],ENT_QUOTES); //this will remove special characters from the variable which can create problems inserting in database
$quer=mysql_query("select passwd from students where rollno='$roll'");  //to maintain correct access we created passwd from student table and rollno as username from user's input
$row = mysql_fetch_row($quer);
$pass1=$row[0];
$ip=$_SERVER['REMOTE_ADDR'];
if($passwd==$pass1){
mysql_query("INSERT INTO c_prog (rollno,prg_name,prog_content,prog_result,ip)values('$_POST[rollno]','$_POST[prg_name]','$source','$outnerr','$ip')")or die(mysql_error()); ;
echo "<h3>program saved successfully</h3>";
}
else
echo "Rollno or password doesn't matches";
mysql_close($con);

require 'footer.php';
echo "</body";
echo "</html>";
?>
