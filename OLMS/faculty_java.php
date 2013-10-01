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
$jfile="J$filename";
$jsource="$jfile.java";

echo "<form action=faculty_upload_java.php  method= post enctype= multipart/form-data >";
echo "<label for=file> Choose a java file to Compile </label>";
echo "<input type=file name= file id= file /> ";
echo "<input type=submit name=submit value='Submit and Compile' />";
echo "</form>";

echo "<form action=faculty_java_compile.php method= post >";
echo "<h3>To avoid name conflicting Your class name should be </h3> ";
echo "<input type=text name=ClassFile value=$jfile  ><br>";
echo "<h3> and Your source file should be named as </h3>";
echo "<input type=text name=SourceFile value=$jsource ><br>";
echo "<textarea name=source cols=60 rows=20></textarea>";
echo "<input type=submit value=Compile>";
echo "</form> ";

require 'faculty_footer.php';

echo "</body>";
echo "</html>";

?>
