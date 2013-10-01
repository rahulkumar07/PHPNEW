<?php 
echo "<html>";
echo "<head>";
require 'settings.php';
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo " $header";
require 'fac_header.php';


$lang=$_POST['lang'];
$id=$_POST['id'];
$passwd=$_POST['pass'];
$prog_name=$_POST['prog_name'];
if ($lang=="fac_c_prog")
$lang_selected="C";
else if ($lang=="fac_cpp_prog")
$lang_selected="C++";
else 
$lang_selected="JAVA";
echo "<h4> Showing programs for $lang_selected </h4>";
$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
mysql_select_db("$db_name") or die('Could not select database');

$quer=mysql_query("select passwd from faculty where id='$id'");  //to maintain correct access we created passwd from student table and id as username from user's input
$row = mysql_fetch_row($quer);
$pass1=$row[0];

if($passwd==$pass1 && !empty($passwd)){
	if(empty($prog_name))              //Here beware isset will not work neither is_null will work 
	{
	$quer=mysql_query("select *from $lang where id=$id order by date_time desc");
	}
	else{
	$quer=mysql_query("select *from $lang where id=$id and prog_name='$_POST[prog_name]' order by date_time desc");
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

for($i = -1; $i < count($all) ; $i++) {
    create_table($all[$i]);
}
echo "</table>";


}












require 'faculty_footer.php';
?>
