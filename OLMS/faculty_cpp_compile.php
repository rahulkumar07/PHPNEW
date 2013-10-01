<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo " $header";
require 'fac_header.php';
$filename=rand();
$file="$filename.cpp";
echo "Your C++ file generated is j$file ..... 
<br>Click on filename to  download your file ...<a href=$file  >$file </a><br>";

$fp=fopen($file, "w");
$data=$_POST['source'];
fwrite($fp, $data);
fclose($file);
echo `g++ -o $filename $file 2> $filename.err `;
$ex=`g++ -o $filename $file ;echo $?`;
echo "<br>";
if ($ex==0){ 
echo "your executable file is on <a href=$filename> $filename </a> <br>";}
$out= `./$filename`; 
$ercc=  `cat $filename.err`;
$outnerr=$ercc . $out;

echo "<br/>";

echo "<form action=faculty_submit_cpp.php method= post >";
echo "Yours Source code is <br>";
echo "<textarea name=source1 cols=60 rows=20 readonly=readonly>$data</textarea><br>"; 
/*here textarea is made readonly so that during the course of submitting data from here to the database student cannot edit the source and output as both are tightly coupled */
echo "And your output/error is ::: <br>";
echo "<textarea name=outnerr cols=60 rows=2 readonly=readonly>$outnerr</textarea><br>";
echo "<input type=submit value='Save your Code to DB'>";
echo "</form> ";
$ip=$_SERVER['REMOTE_ADDR'];
$con = mysql_connect($host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());
mysql_select_db("$db_name") or die('Could not select database');
$outnerr=htmlentities($outnerr,ENT_QUOTES);   //this removes '(aprostrophe from going inside the database) replace with their corrosponding html ascii values...
mysql_query("INSERT INTO guest_cpp_prog(prog_content,prog_result,ip) values('$source','$outnerr','$ip')")or die(mysql_error()); ;
echo "<h3> Use browser's back  button to retain ur code in text area<br></h3>";

require 'faculty_footer.php';

echo "</body";
echo "</html>";
?>
