<?php 
echo "<html>";
echo "<head>";
require 'settings.php';

echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";
require 'header.php';
//require 'db_connect.php';
$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
mysql_select_db("$db_name") or die('Could not select database');
$passwd=$_POST['pass'];
$roll=$_POST['rollno'];
$quer=mysql_query("select passwd from students where rollno='$roll'");  //to maintain correct access we created passwd from student table and rollno as username from user's input
$row = mysql_fetch_row($quer);
$pass1=$row[0];
$lang=$_POST['lang'];
//echo "you have selected $lang language <br>";   this is to check whether correct lang is selected or not
$prog_name=$_POST['prog_name'];
if($passwd==$pass1 && !empty($passwd)){
	if(empty($prog_name))              //Here beware isset will not work neither is_null will work 
	{
	$quer=mysql_query("select *from $lang where rollno=$roll order by date_time desc");
	}
	else{
	$quer=mysql_query("select *from $lang where rollno=$roll and prg_name LIKE '$_POST[prog_name]%' order by date_time desc");
	}
function mysql_fetch_all($quer) {
   while($row=mysql_fetch_array($quer)) {
       $return[] = $row;
   }
   return $return;
}

function create_table($dataArr) {
    echo "<tr>";
	$counting=count($dataArr) - 6;
	//echo "$counting";
	    for($j = 1; $j < $counting; $j++) {
        echo "<td> <textarea >$dataArr[$j] </textarea><br>" . "</td>";
    }
    echo "</tr>";
}

$all = mysql_fetch_all($quer);

echo "<table class='data_table'>";

for($i = 0; $i < count($all) ; $i++) {
    create_table($all[$i]);
}
echo "</table>";


}
else 
echo "password or username not matches in the database ";


require 'footer.php';
?>
