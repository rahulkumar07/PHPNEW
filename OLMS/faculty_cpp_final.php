<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo " $header";
require 'fac_header.php';
$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
mysql_select_db("$db_name") or die('Could not select database');
$passwd=$_POST['pass'];
$id=$_POST['id'];
$outnerr=htmlentities($_POST['outnerr'],ENT_QUOTES); //this will remove special characters from the variable which can create problems inserting in database
$quer=mysql_query("select passwd from faculty where id='$id'");  //to maintain correct access we created passwd from student table and rollno as username from user's input
$row = mysql_fetch_row($quer);
$pass1=$row[0];
$ip=$_SERVER['REMOTE_ADDR'];
if(($passwd==$pass1) && (!empty($passwd))){
mysql_query("INSERT INTO fac_cpp_prog (id,prog_name,prog_content,prog_result,ip)values('$_POST[id]','$_POST[prog_name]','$source','$outnerr','$ip')")or die(mysql_error()); ;
echo "<h3>program saved successfully";
}
else
echo "ID or password doesn't matches";
mysql_close($con);

require 'faculty_footer.php';
echo "</body";
echo "</html>";
?>
