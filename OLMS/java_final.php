<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";
require 'header.php';


$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
mysql_select_db("$db_name") or die('Could not select database');
//echo 'Connected successfully';   This is to check that our code can reach to the database or not
$passwd=htmlentities($_POST['pass'],ENT_QUOTES);;
$roll=$_POST['rollno'];
$ip=$_SERVER['REMOTE_ADDR'];
$quer=mysql_query("select passwd from students where rollno='$roll'");  //to maintain correct access we created passwd from student table and rollno as username from user's input
$row = mysql_fetch_row($quer);
$pass1=$row[0];
if($passwd==$pass1){
$outnerr=htmlentities($_POST['outnerr'],ENT_QUOTES);
mysql_query("INSERT INTO java_prog(rollno,prg_name,prog_content,prog_result,ip) values('$_POST[rollno]','$_POST[prg_name]','$source','$outnerr','$ip')")or die(mysql_error()); ;
echo "<h3>Program saved successfully</h3>";
}
else
echo "Rollno or password doesn't matches";
mysql_close($con);
require 'footer.php';
?>



</body>
</html>
