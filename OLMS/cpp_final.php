<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo " $header";
require 'header.php';

require 'db_connect.php';   //this should always above $quer otherwise $quer will not work
$passwd=$_POST['pass'];
$roll=$_POST['rollno'];
$quer=mysql_query("select passwd from students where rollno='$roll'");  //to maintain correct access we created passwd from student table and rollno as username from user's input
$row = mysql_fetch_row($quer);
$pass1=$row[0];
$outnerr=htmlentities($_POST['outnerr'],ENT_QUOTES);
$source=htmlentities($_POST['source'],ENT_QUOTES);
require 'db_connect.php';
if($passwd==$pass1){
mysql_query("INSERT INTO cpp_prog (rollno,prg_name,prog_content,prog_result,ip)values('$_POST[rollno]','$_POST[prg_name]','$source','$outnerr','$ip')")or die(mysql_error()); ;
echo "<h3>program saved successfully</h3>";
}
else
echo "Rollno or password doesn't matches";
mysql_close($con);

require 'footer.php';
echo "</body";
echo "</html>";
?>
