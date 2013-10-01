<?php
require 'settings.php';
echo "<html>";
echo "<head>";
echo "<title>$site_title </title>";
echo "</head>";
echo "<body bgcolor=$bgcolor>";
echo "$header";
require 'header.php';
$jfile=$_POST['ClassFile'];
$jsource=$_POST['SourceFile'];
$data=$_POST['source'];
if(!empty($data)){
$fp=fopen($jsource, "w");
fwrite($fp, $data);
fclose($jsource);

echo "Your JAVA source file generated is ...<a href=$jsource  >$jsource </a><br>";

echo `/usr/bin/javac $jsource 2> $jfile.err `;
$exst=`/usr/bin/javac $jsource ;echo $?`;

if($exst==0)
echo "Your JAVA class file generated is $jfile ...<a href=$jfile.class  >$jfile.class </a><br>";

$out= `java $jfile`; 
$err=`cat $jfile.err`;
$outnerr=$out . $err;
echo "<br/><form action=submit_java.php method=POST>";
echo "<h3>Yours Source code is</h3>";
echo "<textarea name=source1 cols=60 rows=20 readonly=readonly> $data </textarea><br>";
echo "<h3>And your output/error is :::</h3>";
echo "<textarea name=outnerr cols=60 rows=2 readonly=readonly>$outnerr</textarea><br>";
echo "<input type=submit value='Save your Code to DB'>";
echo "</form> ";
require 'db_connect.php';
mysql_query("INSERT INTO guest_java_prog(prog_content,prog_result,ip) values('$source','$outnerr','$ip')")or die(mysql_error()); ;
}
else
echo "<h4>At least write something in code area before compiling</h4>";
require 'footer.php';
echo "</body>";
echo "</html>";
?>
