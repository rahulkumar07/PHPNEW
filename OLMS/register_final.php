<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";
require 'header.php';
$name=$_POST['name'];
$rollno=$_POST['rollno'];
$pass=mb_convert_encoding($_POST['pass'], 'HTML-ENTITIES', "UTF-8"); 
$pass1=mb_convert_encoding($_POST['pass1'], 'HTML-ENTITIES', "UTF-8");
$branch=$_POST['branch'];
$passyear=$_POST['passyear'];
$mobno=$_POST['mobno'];
$emailid=$_POST['emailid'];

//if( !empty($name) && !empty($rollno) && !empty($branch) && !empty($passyear) && !empty($emailid) ){
if(is_numeric($rollno))
	{
	if(is_numeric($mobno)){
	if($pass==$pass1 && !empty($pass))   //always take a note for empty field
		{
		$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
		mysql_select_db("$db_name") or die('Could not select database');
		mysql_query("INSERT INTO students values('$_POST[rollno]','$_POST[name]','$pass','$branch','$_POST[passyear]','$_POST[mobno]','$_POST[emailid]')")or die(mysql_error()); 
		echo "<h2>Registerd Successfully</h2>";
		mysql_close($con);
		}
	else
		echo "<h1>both passwd donot matches Enter Again</h1>";}
	else 
		echo "<h1>please enter a Valid mobile No</h1>";
	}
else 
	echo "Please enter a numeric value in Rollno";
//}
//else
//echo "All fields are mandatory";



echo "<h3>Click <a href=index.php> here <a>to go main page </h3>" ;
require 'footer.php';
echo "</body";
echo "</html>";
?>
